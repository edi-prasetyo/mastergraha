<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagFormRequest;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(TagFormRequest $request)
    {
        $validatedData = $request->validated();

        $uuid = Str::uuid();
        $slugRequest = Str::slug($request['name']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $tag = new Tag;
        $tag->uuid = $uuid;
        if (Tag::where('slug', $slugRequest)->exists()) {
            $tag->slug = $slug;
        } else {
            $tag->slug = $slugRequest;
        }
        $tag->name = $validatedData['name'];
        $tag->save();
        return redirect('admin/tags')->with('message', 'Tag Has Added');
    }
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(TagFormRequest $request, $tag)
    {
        $validatedData = $request->validated();
        $tag = Tag::findOrFail($tag);
        $tag->name = $validatedData['name'];
        $tag->update();
        return redirect('admin/tags')->with('message', 'tag update Succesfully');
    }
    public function destroy(int $tag_id)
    {
        $tag = Tag::where('id', $tag_id)->first();
        // return $tagparrent_id;
        $tag->delete();
        return redirect()->back()->with('message', 'Tag was Deleted!');
    }
}
