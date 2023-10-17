<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;

class FrontendController extends Controller
{
    public function index()
    {

        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->take(3)->get();
        $services = Service::all();
        return view('frontend.index', compact('sliders', 'categories', 'products', 'services'));
    }
    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products =  $category->products()->get();
            return view('frontend.category.products', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }
}
