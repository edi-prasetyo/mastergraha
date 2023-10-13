<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return $pages;
    }
    public function detail($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.page.detail', compact('page'));
    }
}
