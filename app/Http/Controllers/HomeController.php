<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordFormRequest;
use App\Http\Requests\UpgradeFrormRequest;
use App\Models\Bank;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Wallet;
use App\Models\Walletlog;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $wallets = Wallet::where('user_id', $userId)->first();
        $userDetail = UserDetail::where('user_id', $userId)->first();
        $count_orders = Order::where('user_id', $userId)->count();
        $bill = Order::where(['user_id' => $userId, 'payment_status' => 0])->sum('amount');
        // return $bill;
        return view('home', compact('wallets', 'count_orders', 'userDetail', 'bill'));
    }
    public function orders()
    {
        $userId = Auth::user()->id;
        $orders = Order::where('user_id', $userId)->orderBy('id', 'desc')->paginate(7);
        return view('frontend.member.order', compact('orders'));
    }
    public function order_detail($code)
    {
        $order_detail = Order::where('code', $code)->first();
        $product = Product::where('id', $order_detail->product_id)->first();
        $subscription = Subscription::where('id', $order_detail->subscription_id)->first();
        $website = Website::where('id', $subscription->website_id)->first();
        return view('frontend.member.order_detail', compact('order_detail', 'product', 'subscription', 'website'));
    }

    function downloadFile($file_download)
    {

        $file_path = public_path('downloads/' . $file_download);
        return response()->download($file_path);
    }
    public function wallet()
    {
        $userId = Auth::user()->id;
        $wallets = Wallet::where('user_id', $userId)->first();
        $wallet_logs = Walletlog::where('user_id', $userId)->orderBy('id', 'desc')->paginate(5);
        return view('frontend.member.wallet', compact('wallets', 'wallet_logs'));
    }
    public function struk(Request $request)
    {
        $order_id = $request['order_id'];
        $order = Order::findOrFail($order_id);
        $order->status = 1;

        if ($request->hasFile('struk')) {
            $file = $request->file('struk');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/struk/', $filename);
            $order->struk = $filename;
        }

        $order->update();
        return redirect('member/orders/detail/' . $order->code)->with('message', 'Order Successfully');
    }
    public function profile()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $userDetail = UserDetail::where('user_id', $userId)->first();
        // return $userDetail;
        return view('frontend.member.profile', compact('user', 'userDetail'));
    }
    public function edit_password()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        return view('frontend.member.edit_password', compact('user'));
    }
    public function update_password(PasswordFormRequest $request)
    {
        $validatedData = $request->validated();

        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $user->password = Hash::make($validatedData['password']);
        $user->update();

        return redirect('member/profile')->with('message', 'Password Update successfully!');
    }

    public function upgrade()
    {
        return view('frontend.member.upgrade');
    }
    public function upgrade_store(UpgradeFrormRequest $request)
    {
        $validatedData = $request->validated();
        $merchant_id = random_int(1000000, 9999999);

        $userDetail = new UserDetail;
        $userDetail->uuid = Str::uuid()->toString(50);
        $userDetail->user_id =  Auth::user()->id;
        $userDetail->avatar = $validatedData['avatar'];
        $userDetail->merchant_id = $merchant_id;
        $userDetail->merchant_name = $validatedData['merchant_name'];
        $userDetail->merchant_address = $validatedData['merchant_address'];
        $userDetail->bank_name = $validatedData['bank_name'];
        $userDetail->bank_number = $validatedData['bank_number'];
        $userDetail->bank_account = $validatedData['bank_account'];

        $uploadPath = 'uploads/avatar/';
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/avatar/', $filename);
            $userDetail->avatar = $uploadPath . $filename;
        }

        $userDetail->save();

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->role = 3;
        $user->update();

        return redirect('member/profile')->with('message', 'Profile Upgrade successfully!');
    }

    public function websites()
    {
        $user_id = Auth::user()->id;
        $subscriptions = Subscription::where(['user_id' => $user_id, 'status' => 1])->paginate(5);
        // return $subscriptions;
        return view('frontend.member.website', compact('subscriptions'));
    }
}
