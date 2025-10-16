<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['changeLang'])->group(function () {


    Route::get('/', [UserController::class, 'home'])->name('home');


    Route::middleware([
        'auth:sanctum',
        'changeLang',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        // Route::get('/', [UserController::class, 'home'])->name('dashboard');
    });
    Route::get('/change/{lang}', function (Request $request, $lang) {
        $lang = in_array($lang, ['en', 'ar']) ? $lang : 'en';
        $request->session()->put('lang', $lang);
        return redirect()->back();
    })->name('change.language');

    Route::get('/about', [UserController::class, 'about'])->name('user.about');
    Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');

    Route::middleware('auth')->group(function () {
        Route::get('/products', [UserController::class, 'index'])->name('user.products');
        // product details
        Route::get('/productDetails/{id}', [UserController::class, 'productDetails'])->name('user.productDetails');
        // add to cart
        Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('user.addToCart');
        // remove from cart
        Route::delete('/removeFromCart/{id}', [CartController::class, 'removeFromCart'])->name('user.removeFromCart');
        // increase quantity
        Route::post('/increaseQuantity/{id}', [CartController::class, 'increaseQuantity'])->name('user.increaseQuantity');
        // decrease quantity
        Route::post('/decreaseQuantity/{id}', [CartController::class, 'decreaseQuantity'])->name('user.decreaseQuantity');
        // display cart
        Route::get("/cart", [CartController::class, 'showCart'])->name('user.showCart');
        // ============================Wishlist==========================
        Route::get("/wishlist", [WishlistController::class, 'showWishlist'])->name('user.showWishlist');
        // add to wishlist
        Route::post('/addToWishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('user.addToWishlist');
        // remove from wishlist
        Route::delete('/removeFromWishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('user.removeFromWishlist');
    });
    // =============================Chckout==========================
    Route::middleware('auth')->group(function () {
        Route::get('/checkoutOrder', [CheckoutController::class, 'checkout'])->name('user.checkout');
        Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('order.place');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    });
});
require __DIR__ . '/admin.php';
