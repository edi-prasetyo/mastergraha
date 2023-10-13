<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Subscription;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }
    function show(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        $product_items = OrderItem::where('order_id', $order_id)
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('order_items.*', 'products.name as product_name', 'products.price as product_price', 'products.file_download', 'products.short_description as product_description')
            ->get();
        $subscription = Subscription::where('id', $order->subscription_id)->first();

        // return $subscription;

        return view('admin.order.detail', compact('order', 'product_items', 'subscription'));
    }
    function confirmation(Request $request, int $order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $order->payment_status = $request['payment_status'];
        $order->status = $request['status'];
        $order->update();

        $subscription_id = $order->subscription_id;

        $subscription = Subscription::where('id', $subscription_id)->first();
        $date =  $subscription->end_date;
        $newDate = date('Y-m-d', strtotime($date . ' + ' . $order->quantity . ' months'));

        $subscription->period = $order->quantity;
        $subscription->start_date = $subscription->end_date;
        $subscription->end_date = $newDate;
        $subscription->status = 1;


        $subscription->update();
        // return $subscription;
        return redirect()->back()->with('message', 'Pembayaran Terkonfirmasi!');
    }
}
