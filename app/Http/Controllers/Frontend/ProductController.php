<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wallet;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->orderBy('id', 'desc')->paginate(6);
        return view('frontend.product.index', compact('products'));
    }
    public function detail($products_slug)
    {
        $header = Slider::where('status', '1')->where('type', 1)->get();
        $product = Product::where('products.slug', $products_slug)
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->first();
        $images = $product->productImages;


        if (!Auth::check()) { //guest user identified by ip
            $cookie_name = (Str::replace('.', '', (request()->ip())) . '-' . $product->id);
        } else {
            $cookie_name = (Auth::user()->id . '-' . $product->id); //logged in user
        }
        if (Cookie::get($cookie_name) == '') { //check if cookie is set
            $cookie = cookie($cookie_name, '1', 60); //set the cookie
            $product->incrementReadCount(); //count the view

            return response()
                ->view('frontend.product.detail', [
                    'product' => $product,

                    'images' => $images,
                ])
                ->withCookie($cookie); //store the cookie
        } else {
            return view('frontend.product.detail', compact('product', 'header', 'images'));
        }
    }
    public function addCoupon($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            abort(404);
        }
        $diskon = session()->get('diskon');
        $diskon[$id] = [
            "name" => $coupon->name,
            "amount" => $coupon->amount,
        ];

        session()->put('diskon', $diskon);
        return $diskon;
        // return redirect()->back()->with('diskon', 'Discount added to cart successfully!');
    }
    public function addToCart($uuid)
    {
        $productDetail = Product::where('uuid', $uuid)->first();
        $id = $productDetail->id;
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "uuid" => $product->uuid,
                    "product_id" => $product->id,
                    "quantity" => 1,
                    "price" => $product->price,
                    "short_description" => $product->short_description,
                    "photo" => $product->image_cover
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "uuid" => $product->uuid,
            "product_id" => $product->id,
            "quantity" => 1,
            "price" => $product->price,
            "short_description" => $product->short_description,
            "photo" => $product->image_cover
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function cart()
    {
        $coupon = Coupon::all();
        $userId =  Auth::user()->id;
        $saldo = Wallet::where('user_id', $userId)->first();
        return view('frontend.cart.cart', compact('saldo', 'coupon'));
    }
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function checkout()
    {

        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('success', 'Cart is Empty');
        } else {
            $userId =  Auth::user()->id;
            $saldo = Wallet::where('user_id', $userId)->first();
            return view('frontend.cart.checkout', compact('saldo'));
        }
    }
}
