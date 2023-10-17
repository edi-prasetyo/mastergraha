<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductFormRequest;
use App\Models\ProductImage;
use App\Models\Program;
use App\Models\Tag;
use App\Models\TagParrent;
use App\Models\Type;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $programs = Program::all();
        $tags = Tag::all();
        // dd($categories);
        return view('admin.products.create', compact('categories', 'programs', 'tags'));
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
        $product->single_price = $request['single_price'];
        $product->full_price = $request['full_price'];
        $product->link_demo = $request['link_demo'];
        $category->status = $request->status == true ? '1' : '0';
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
        // Add Tags
        $tags = $request['tags'];
        foreach ($tags as $key => $tag) {
            $data[] = [
                'tag_id' => $tag,
                'product_id' => $product->id,
            ];
        }
        DB::table('tagparrents')->insert($data);


        return redirect('admin/products')->with('message', 'Product Added Succesfully!');
    }

    public function show(int $product_id)
    {
        $websites = Website::where('product_id', $product_id)->get();
        $product = Product::findOrFail($product_id);
        // return $websites;
        return view('admin.products.show', compact('websites', 'product'));
    }
    public function add_website(Request $request)
    {
        $uuid = Str::uuid();

        $website = new Website;
        $website->uuid = $uuid;
        $website->product_id = $request['product_id'];
        $website->name = $request['name'];
        $website->price = $request['price'];
        $website->facility = $request['facility'];
        $website->description = $request['description'];
        $website->period = $request['period'];
        $website->best_seller = $request->best_seller == true ? '1' : '0';

        $website->save();
        return redirect('admin/products')->with('message', 'Website Added Succesfully!');
    }

    public function edit_website(int $website_id)
    {
        $website = Website::where('id', $website_id)->first();
        $product = Product::where('id', $website->product_id)->first();
        return view('admin.products.edit_website', compact('website', 'product'));
    }
    public function update_website(Request $request, int $website_id)
    {
        $website = Website::where('id', $website_id)->first();
        $website->product_id = $request['product_id'];
        $website->name = $request['name'];
        $website->price = $request['price'];
        $website->facility = $request['facility'];
        $website->description = $request['description'];
        $website->period = $request['period'];
        $website->best_seller = $request->best_seller == true ? '1' : '0';

        $website->update();

        return redirect('admin/products/show/' . $website->product_id)->with('message', 'Website update Succesfully!');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Type::all();
        $product = Product::findOrFail($product_id);
        $tags = Tag::all();
        $tagproduct = TagParrent::where('product_id', $product_id)->join('tags', 'tags.id', '=', 'tagparrents.tag_id')
            ->select('tagparrents.*', 'tags.name as tag_name')
            ->get();
        // return $tagproduct;
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'tags', 'tagproduct'));
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
                $product->name = $request['name'],
                $product->short_description = $request['short_description'],
                $product->description = $request['description'],
                $product->price = $request['price'],
                $product->single_price = $request['single_price'],
                $product->full_price = $request['full_price'],
                $product->link_demo = $request['link_demo'],
                $category->trending = $request->trending == true ? '1' : '0',
                $category->status = $request->status == true ? '1' : '0',
                $product->meta_title = $request['meta_title'],
                $product->meta_description = $request['meta_description'],
                $product->meta_keyword = $request['meta_keyword'],

            ]);

            $uploadPath = 'uploads/products/';
            if ($request->hasFile('image_cover')) {

                $path = 'uploads/products/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image_cover');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/products/', $filename);
                $product->image_cover = $uploadPath . $filename;
            }


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

            // Add Tags
            $tags = $request['tags'];
            foreach ($tags as $key => $tag) {
                $data[] = [
                    'tag_id' => $tag,
                    'product_id' => $product->id,
                ];
            }
            DB::table('tagparrents')->insert($data);

            return redirect('admin/products')->with('message', 'Product Updated Succesfully!');
        } else {
            return redirect('admin/products')->with('message', 'No Such Product ID Found ');
        }
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted!');
    }
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product and Image was Deleted!');
    }
    public function destroywebsite(int $website_id)
    {
        $website = Website::findOrFail($website_id);
        $website->delete();
        return redirect()->back()->with('message', 'Product and Image was Deleted!');
    }
    public function deletetag(int $tagparrent_id)
    {
        $tagparrent = TagParrent::where('id', $tagparrent_id)->first();
        // return $tagparrent_id;
        $tagparrent->delete();
        return redirect()->back()->with('message', 'Product and Image was Deleted!');
    }
}
