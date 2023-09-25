<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Program;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isSeller']);
    }

    public function index()
    {
        $user_id = Auth::id();
        $products = Product::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);
        return view('frontend.member.product', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $programs = Program::all();
        return view('frontend.member.create_product', compact('categories', 'programs'));
    }

    public function store(Request $request)
    {
        $uuid = Str::uuid();

        $slugRequest = Str::slug($request['name']);
        $code = random_int(00, 99);
        $slug = $slugRequest . '-' . $code;

        $category = Category::findOrFail($request['category_id']);


        $product = new Product;
        $product->category_id = $request['category_id'];
        $product->name = $request['name'];
        $product->uuid = $uuid;
        if (Product::where('slug', $slugRequest)->exists()) {
            $product->slug = $slug;
        } else {
            $product->slug = $slugRequest;
        }
        $user_id = Auth::user()->id;
        $product->user_id = $user_id;
        $product->type_id = $request['type_id'];
        $product->short_description = $request['short_description'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->link_demo = $request['link_demo'];
        $category->status = 0;
        $product->meta_title = $request['meta_title'];
        $product->meta_description = $request['meta_description'];
        $product->meta_keyword = $request['meta_keyword'];

        $filenameId = Str::uuid()->toString(100);

        // $uploadDownloads = 'downloads/';
        if ($request->hasFile('file_download')) {
            $file = $request->file('file_download');
            $ext = $file->getClientOriginalExtension();
            $filename = $filenameId . '.' . $ext;
            $file->move('downloads/', $filename);
            $product->file_download = $filename;
        }

        $uploadPath = 'uploads/products/';
        if ($request->hasFile('image_cover')) {
            $file = $request->file('image_cover');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/products/', $filename);
            $product->image_cover = $uploadPath . $filename;
        }

        $product->save();

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i =  1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImanePathName = $uploadPath  . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImanePathName,
                ]);
            }
        }


        return redirect('member/products')->with('message', 'Product Added Succesfully!');
    }
    public function edit_product(String $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        $categories = Category::all();

        // return $product;
        return view('frontend.member.edit_product', compact('product', 'categories'));
    }
    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($request['category_id']);
        $product = Category::findOrFail($validatedData['category_id'])
            ->products()->where('id', $product_id)->first();
        if ($product) {
            $product->update([

                $product->user_id = $product->user_id,
                $product->type_id = $request['type_id'],
                $product->short_description = $request['short_description'],
                $product->description = $request['description'],
                $product->price = $request['price'],
                $category->trending = $request->trending == true ? '1' : '0',
                $category->status = $request->status == true ? '1' : '0',
                $product->meta_title = $request['meta_title'],
                $product->meta_description = $request['meta_description'],
                $product->meta_keyword = $request['meta_keyword'],

            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i =  1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImanePathName = $uploadPath  . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImanePathName,
                    ]);
                }
            }

            return redirect('admin/products')->with('message', 'Product Updated Succesfully!');
        } else {
            return redirect('admin/products')->with('message', 'No Such Product ID Found ');
        }
    }

    public function edit_profile()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $userDetail = UserDetail::where('user_id', $userId)->first();

        return view('frontend.member.edit_profile', compact('user', 'userDetail'));
    }
    public function update_profile()
    {
    }
}
