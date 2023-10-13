<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\Wallet;
use App\Models\Walletlog;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function orders(Request $request)
    {

        $uuid_subs = Str::uuid();
        $subscription = new Subscription;

        $amount =  $request['amount'];
        $total_periode = $request['tot_pin_requested'];
        $total_amount = $amount * $total_periode;

        $subscription->user_id = Auth::user()->id;
        $subscription->uuid = $uuid_subs;
        $subscription->product_id =  $request['website_id'];
        $subscription->website_id = $request['website_id'];
        $subscription->product_name = $request['product_name'];
        $subscription->website_name = $request['website_name'];
        $subscription->domain_name = $request['domain_name'];
        $subscription->period = $request['tot_pin_requested'];
        $subscription->date_created = date('Y-m-d');
        $subscription->start_date = date('Y-m-d');
        $date =  date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($date . ' + ' . $total_periode . ' months'));
        $subscription->end_date = $newDate;

        $subscription->save();


        $uuid = Str::uuid();

        $userId = Auth::user()->id;
        $code = Str::uuid()->toString(50);
        $invoice_number = random_int(100000, 999999);
        $order = new Order;
        $order->user_id = $userId;
        $order->uuid = $uuid;
        $order->subscription_id = $subscription->id;
        $order->product_id = $request['product_id'];
        $order->customer_name = $request['customer_name'];
        $order->customer_email = $request['customer_email'];
        $order->customer_whatsapp = $request['customer_whatsapp'];
        $order->invoice_number = $invoice_number;
        $order->code = $code;
        $order->discount = $request['discount'];
        $order->quantity = $total_periode;
        $amount = $order->amount = $request['amount'];
        $order->total_amount = $total_amount;
        $order->order_type = 'new';
        $order->payment_type = $request['payment_type'];
        $order->payment_status = $request['payment_status'];
        $order->status = $request['status'];

        $order->save();
        // return $deposit;



        return redirect('orders/success/' . $order->code)->with('message', 'Order Successfully');
    }

    public function renewal($uuid)
    {
        $subscription = Subscription::where('uuid', $uuid)->first();
        $website = Website::where('id', $subscription->website_id)->first();
        $product = Product::where('id', $subscription->product_id)->first();
        // return $website;
        return view('frontend/website/renewal', compact('subscription', 'website', 'product'));
    }

    public function add_renewal(Request $request)
    {
        $amount =  $request['amount'];
        $total_periode = $request['tot_pin_requested'];
        $total_amount = $amount * $total_periode;

        $uuid = Str::uuid();

        $userId = Auth::user()->id;
        $code = Str::uuid()->toString(50);
        $invoice_number = random_int(100000, 999999);
        $order = new Order;
        $order->user_id = $userId;
        $order->uuid = $uuid;
        $order->subscription_id = $request['subscription_id'];
        $order->product_id = $request['product_id'];
        $order->customer_name = $request['customer_name'];
        $order->customer_email = $request['customer_email'];
        $order->customer_whatsapp = $request['customer_whatsapp'];
        $order->invoice_number = $invoice_number;
        $order->code = $code;
        $order->discount = $request['discount'];
        $order->quantity = $total_periode;
        $amount = $order->amount = $amount;
        $order->total_amount = $total_amount;
        $order->order_type = 'renewal';
        $order->payment_type = $request['payment_type'];
        $order->payment_status = $request['payment_status'];
        $order->status = $request['status'];

        $order->save();
        return redirect('orders/success/' . $order->code)->with('message', 'Order Successfully');
    }

    public function success($code)
    {
        $order = Order::where('code', $code)->first();
        $subscription_id = $order->subscription_id;
        $subscriptions = DB::table('subscriptions')->where('subscriptions.id', $subscription_id)
            ->join('products', 'products.id', '=', 'subscriptions.product_id')
            ->select('subscriptions.*', 'products.name as product_name', 'products.price as product_price', 'products.short_description as product_description')
            ->first();
        $websites = Website::where('product_id', $order->product_id)->first();
        // return $subscriptions;
        return view('frontend.order.success', compact('order', 'subscriptions', 'websites'));
    }

    function payment($code)
    {
        $order = Order::where('code', $code)->first();
        $order_id = $order->id;
        $banks = Bank::all();
        $order_items = DB::table('order_items')->where('order_id', $order_id)
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('order_items.*', 'products.name as product_name', 'products.price as product_price', 'products.short_description as product_description')
            ->get();
        // return $order;
        return view('frontend.member.payment', compact('order', 'order', 'order_items', 'banks'));
    }
}
