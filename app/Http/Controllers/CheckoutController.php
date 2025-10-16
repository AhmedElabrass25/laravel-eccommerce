<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $userId = auth()->id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        // احسب الإجمالي
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return view('user.checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $userId = auth()->id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        // dd($cartItems);
        if ($cartItems->isEmpty()) {
            return redirect()->route('user.showCart')->with('error', 'Your cart is empty.');
        }

        // أنشئ الأوردر
        $order = Order::create([
            'user_id' => $userId,
            'total'   => $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
            'status'  => 'pending',
        ]);

        // أضف التفاصيل
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // فضي الكارت
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order placed successfully!');
    }
}
