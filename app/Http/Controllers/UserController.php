<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        // لو المستخدم مسجل دخول
        if (Auth::check()) {
            $role = strtolower(trim(Auth::user()->role));

            if ($role === 'admin') {
                return view('dashboard.index');
            }

            if ($role === 'user') {
                $products = Product::inRandomOrder()->take(3)->get();

                $cartProductIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
                $wishlistProductIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();

                return view('user.index', compact('products', 'cartProductIds', 'wishlistProductIds'));
            }
        }

        // Guest → يشوف المنتجات بس
        $products = Product::inRandomOrder()->take(3)->get();
        return view('user.index', compact('products'));
    }
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query();

        // فلترة بالكاتيجوري
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // فلترة بالبحث (اسم / وصف)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // تجيب المنتجات بالترتيب الأحدث + مع pagination
        $products = $query->latest()->paginate(5);

        // جلب المنتجات اللي في الكارت
        $cartProductIds = Cart::where('user_id', auth()->id())
            ->pluck('product_id')
            ->toArray();

        // جلب المنتجات اللي في الـ wishlist
        $wishlistProductIds = Wishlist::where('user_id', auth()->id())
            ->pluck('product_id')
            ->toArray();

        return view('user.products', compact(
            'products',
            'categories',
            'cartProductIds',
            'wishlistProductIds'
        ));
    }

    public function about()
    {
        return view('user.about');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function productDetails($id)
    {
        $product = Product::findorFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)->inRandomOrder()->get();
        $cartProductIds = Cart::pluck('product_id')->toArray();
        $wishlistProductIds = Wishlist::pluck('product_id')->toArray();
        return view('user.productDetails', compact('product', 'relatedProducts', 'cartProductIds', 'wishlistProductIds'));
    }
}
