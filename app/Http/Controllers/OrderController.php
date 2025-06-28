<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::with('products')->where('user_id', auth()->id())->latest()->get();
        return view('orders', compact('orders'));
    }

    public function show($id)
{
    $order = Order::with('products')->find($id);

    if (!$order) {
        abort(404, 'Order not found');
    }

    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access to this order');
    }

    return view('order_detail', compact('order'));
}

}
