<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        // if (Auth::check() &&  strtolower(trim(Auth::user()->role)) === 'user') {
        //     $products = Product::latest()->take(3)->get();

        //     $cartProductIds = Cart::pluck('product_id')->toArray();
        //     $wishlistProductIds = Wishlist::pluck('product_id')->toArray();

        //     return view('user.index', compact('products', 'cartProductIds', 'wishlistProductIds'));
        // }
        // لو المستخدم زائر (مش عامل login) → يظهر المنتجات بدون cart/wishlist
        // $products = Product::latest()->take(3)->get();
        // return view('user.index', compact('products'));
    }
}
