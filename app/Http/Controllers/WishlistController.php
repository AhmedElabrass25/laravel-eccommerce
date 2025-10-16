<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function showWishlist()
    {
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.wishlist', compact('wishlistItems'));
    }

    public function addToWishlist($productId)
    {
        // if there is no user login, show error message
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please login to add to wishlist!');
        }
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    public function removeFromWishlist($productId)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }
}
