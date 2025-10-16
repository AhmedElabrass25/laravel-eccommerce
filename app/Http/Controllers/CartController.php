<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('user.cart', compact('cartItems'));
    }
    public function addToCart($id)
    {
        $userId = auth()->id();
        // check if there is user or not
        if (!$userId) {
            return back()->with('error', 'Please login first');
        }
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            return back()->with('success', 'Product already in cart');
        }

        Cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'quantity' => 1,
        ]);

        return back()->with('success', 'Product added to cart');
    }
    public function removeFromCart($id)
    {
        $userId = auth()->id();
        Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->delete();
        return back()->with('success', 'Product removed from cart');
    }
    public function increaseQuantity($id)
    {
        // but should not increase over the product quantity (out of stock)
        $userId = auth()->id();
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();
        $product = $cartItem->product; // Assuming you have relation Cart -> product

        if ($cartItem->quantity < $product->quantity) {
            $cartItem->increment('quantity');
            return back()->with('success', 'Product quantity increased');
        } else {
            return back()->with('error', 'Not enough stock available');
        }
    }
    public function decreaseQuantity($id)
    {
        $userId = auth()->id();
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem->quantity > 1) {
            // لو أكتر من 1 قلل العدد
            $cartItem->decrement('quantity');
            return back()->with('success', 'Product quantity decreased');
        } else {
            // لو بقى 1 وشلنا منه → يتشال المنتج كله
            $cartItem->delete();
            return back()->with('success', 'Product removed from cart');
        }
    }
}
