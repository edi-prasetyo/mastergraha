<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageFormRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }
    public function create()
    {
        return view('admin.page.create');
    }
    public function store(PageFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/page/', $filename);
            $validatedData['image'] = "uploads/page/$filename";
        }


        $slugRequest = Str::slug($request['title']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $page = new Page;
        if (Page::where('slug', $slugRequest)->exists()) {
            $page->slug = $slug;
        } else {
            $page->slug = $slugRequest;
        }
        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];
        $page->image = $validatedData['image'];
        $page->meta_title = $validatedData['meta_title'];
        $page->meta_description = $validatedData['meta_description'];
        $page->meta_keywords = $validatedData['meta_keywords'];

        $page->save();

        return redirect('admin/pages')->with('message', 'Page Added Succesfully');
    }
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }
    public function update(PageFormRequest $request, Page $page)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $page->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/page/', $filename);
            $validatedData['image'] = $filename;
        }


        Page::where('id', $page->id)->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $validatedData['image'] ?? $page->image,
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'meta_keywords' => $request['meta_keywords'],
        ]);
        return redirect('admin/pages')->with('message', 'Image Slider Update Succesfully');
    }
    public function destroy(Page $page)
    {
        if ($page->count() > 0) {

            $destination = $page->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $page->delete();
            return redirect('admin/pages')->with('message', 'Page Delete Succesfully');
        }
        return redirect('admin/pages')->with('message', 'Someting Went Wrong');
    }
}
