<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * عرض تفاصيل أوردر واحد
     */
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        // dd($order->toArray());


        // اتأكد إن الأوردر خاص بالمستخدم الحالي
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('user.orders.show', compact('order'));
    }

    /**
     * عرض كل الطلبات الخاصة بالمستخدم
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.product')
            ->latest()
            ->get();

        return view('user.orders.index', compact('orders'));
    }
}
