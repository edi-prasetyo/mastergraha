<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\HelpItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::orderBy('id', 'DESC')->paginate(10);
        return view('admin.help.index', compact('helps'));
    }
    public function create()
    {
        return view('admin.help.create');
    }
    public function store(Request $request)
    {
        $slugRequest = Str::slug($request['title']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $help = new Help;
        if (Help::where('slug', $slugRequest)->exists()) {
            $help->slug = $slug;
        } else {
            $help->slug = $slugRequest;
        }
        $help->name = $request['name'];
        $help->description = $request['description'];

        $help->save();

        return redirect('admin/helps')->with('message', 'Help Added Succesfully');
    }
    public function edit(Help $help)
    {
        return view('admin.help.edit', compact('page'));
    }
    public function update(Request $request, Help $help)
    {
        Help::where('id', $help->id)->update([
            'title' => $request['name'],
            'content' => $request['description'],
        ]);
        return redirect('admin/helps')->with('message', 'Help Update Succesfully');
    }
    public function destroy(Help $help)
    {
        $help = Help::findOrFail($help);
        $help->delete();
        return redirect('admin/helps')->with('message', 'Page Delete Succesfully');
    }
    // Add Item
    public function show(int $help_id)
    {
        $help = Help::where('id', $help_id)->first();
        $helpItems = HelpItem::where('help_id', $help_id)->get();
        return view('admin.help.show', compact('help', 'helpItems'));
    }
    public function add_item(Request $request)
    {
        $slugRequest = Str::slug($request['title']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $uuid = Str::uuid();

        $helpItem = new HelpItem;
        if (Help::where('slug', $slugRequest)->exists()) {
            $helpItem->slug = $slug;
        } else {
            $helpItem->slug = $slugRequest;
        }
        $helpItem->uuid = $uuid;
        $helpItem->title = $request['title'];
        $helpItem->help_id = $request['help_id'];
        $helpItem->content = $request['content'];
        $helpItem->meta_title = $request['meta_title'];
        $helpItem->meta_keyword = $request['meta_keyword'];
        $helpItem->meta_description = $request['meta_description'];
        $helpItem->status = $request->status == true ? '1' : '0';

        $helpItem->save();

        return redirect()->back()->with('message', 'Hellp Item Added Succesfully!');
    }
}
