<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::orderBy('id', 'DESC')->paginate(10);
        return $helps;
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

        $page = new Help;
        if (Help::where('slug', $slugRequest)->exists()) {
            $page->slug = $slug;
        } else {
            $page->slug = $slugRequest;
        }
        $page->title = $request['name'];
        $page->content = $request['description'];

        $page->save();

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
}
