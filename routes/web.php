<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
// use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::prefix('member')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/orders', [HomeController::class, 'orders']);
    Route::get('/orders/detail/{code}', [HomeController::class, 'order_detail']);
    Route::get('/wallets', [HomeController::class, 'wallet']);
    Route::post('/struk', [HomeController::class, 'struk']);
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/edit-profile', [SellerController::class, 'edit_profile']);
    Route::put('/update_profile', [SellerController::class, 'update_profile']);
    Route::get('/update-password', [HomeController::class, 'edit_password']);
    Route::put('/update_password', [HomeController::class, 'update_password']);
    Route::get('/upgrade', [HomeController::class, 'upgrade']);
    Route::post('/upgrade-store', [HomeController::class, 'upgrade_store']);
    Route::get('/products', [SellerController::class, 'index']);
    Route::post('/products', [SellerController::class, 'store']);
    Route::get('/products/create', [SellerController::class, 'create']);
    Route::get('/products/edit/{uuid}', [SellerController::class, 'edit_product']);
    Route::put('/products/{product_id}', [SellerController::class, 'update_product']);
    Route::post('websites', [CategoryController::class, 'fetchType']);

    Route::get('websites', [HomeController::class, 'websites']);


    Route::get('directory/9f37359d-79bf-4a20-ae3e-a282d709d909/file/{file_download}', [HomeController::class, 'downloadFile']);
});

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'categories']);
Route::get('/category/{category_slug}', [FrontendController::class, 'products']);
Route::get('/item/{product_slug}', [FrontendProductController::class, 'detail']);
Route::get('/products', [FrontendProductController::class, 'index']);
Route::get('/pages', [FrontendPageController::class, 'index']);
Route::get('/pages/detail/{slug}', [FrontendPageController::class, 'detail']);
// Route::get('/blog', [FrontendBlogController::class, 'index']);


// Cart
Route::get('add-to-cart/{uuid}', [FrontendProductController::class, 'addToCart'])->name('add.to.cart');
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [FrontendProductController::class, 'cart'])->name('cart');
    Route::patch('update-cart', [FrontendProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [FrontendProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('checkout', [FrontendProductController::class, 'checkout'])->name('checkout');
    Route::post('orders', [FrontendOrderController::class, 'orders'])->name('orders');
    Route::get('/orders/renewal/{uuid}', [FrontendOrderController::class, 'renewal'])->name('renewal');
    Route::post('/orders/add_renewal', [FrontendOrderController::class, 'add_renewal'])->name('add_renewal');
    Route::get('/orders/success/{code}', [FrontendOrderController::class, 'success'])->name('success');
    Route::get('/payment/{code}', [FrontendOrderController::class, 'payment']);
    Route::get('add-coupon/{id}', [FrontendProductController::class, 'addCoupon']);
    Route::get('subscription/order/{uuid}', [WebsiteController::class, 'order']);
});

// Subscription
Route::get('subscription/{uuid}', [WebsiteController::class, 'subscription']);



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    // Category Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/edit/{category}', 'edit');
        Route::put('/category/{category}', 'update');
        Route::get('/category/delete/{category}', 'destroy');

        Route::post('category/fetch-types', 'fetchType');
    });

    // Type Route
    Route::controller(TypeController::class)->group(function () {
        Route::get('/types', 'index');
        Route::get('/types/create', 'create');
        Route::post('/types', 'store');
        Route::get('/types/edit/{type}', 'edit');
        Route::put('/types/{type}', 'update');
    });
    // Program Route
    Route::controller(ProgramController::class)->group(function () {
        Route::get('/programs', 'index');
        Route::get('/programs/create', 'create');
        Route::post('/programs', 'store');
        Route::get('/programs/edit/{brand}', 'edit');
        Route::put('/programs/{brand}', 'update');
    });
    // Bank Route
    Route::controller(BankController::class)->group(function () {
        Route::get('/banks', 'index');
        Route::get('/banks/create', 'create');
        Route::post('/banks', 'store');
        Route::get('/banks/edit/{bank}', 'edit');
        Route::put('/banks/{bank}', 'update');
    });
    // Tag Route
    Route::controller(TagController::class)->group(function () {
        Route::get('/tags', 'index');
        Route::get('/tags/create', 'create');
        Route::post('/tags', 'store');
        Route::get('/tags/edit/{tag}', 'edit');
        Route::put('/tags/{tag}', 'update');
        Route::get('/tags/delete/{product_id}', 'destroy');
    });
    // Service Route
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'index');
        Route::get('/services/create', 'create');
        Route::post('/services', 'store');
        Route::get('/services/edit/{service}', 'edit');
        Route::put('/services/{service}', 'update');
    });
    // Coupon Route
    Route::controller(CouponController::class)->group(function () {
        Route::get('/coupons', 'index');
        Route::get('/coupons/create', 'create');
        Route::post('/coupons', 'store');
        Route::get('/coupons/edit/{coupon}', 'edit');
        Route::put('/coupons/{coupon}', 'update');
    });
    // Product Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/edit/{product}', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/delete/{product_image_id}', 'destroyImage');
        Route::get('/products/delete/{product_id}', 'destroy');
        Route::get('/products/show/{product_id}', 'show');
        Route::post('/products/add_website', 'add_website');
        Route::get('/products/edit_website/{website_id}', 'edit_website');
        Route::put('/products/update_website/{website_id}', 'update_website');
        Route::get('/products/delete_website/{website_id}', 'destroywebsite');
        Route::get('/products/delete_tag/{tagparrent_id}', 'deletetag');
    });
    // Order Route
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{order_id}', 'show');
        Route::post('/orders/confirmation/{order_id}', 'confirmation');
    });
    // Sliders Route
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/edit/{slider}', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/delete/{slider}', 'destroy');
    });
    // Pages Route
    Route::controller(PageController::class)->group(function () {
        Route::get('/pages', 'index');
        Route::get('/pages/create', 'create');
        Route::post('/pages/create', 'store');
        Route::get('/pages/edit/{page}', 'edit');
        Route::put('/pages/{page}', 'update');
        Route::get('/pages/delete/{page}', 'destroy');
    });
    // Helps Route
    Route::controller(HelpController::class)->group(function () {
        Route::get('/helps', 'index');
        Route::get('/helps/create', 'create');
        Route::post('/helps/create', 'store');
        Route::get('/helps/edit/{help}', 'edit');
        Route::put('/helps/{help}', 'update');
        Route::get('/helps/delete/{help}', 'destroy');
    });

    // Option Route
    Route::controller(OptionController::class)->group(function () {
        Route::get('/options', 'index');
        Route::get('/options/edit/{brand}', 'edit');
        Route::post('/options', 'update');
    });
});
