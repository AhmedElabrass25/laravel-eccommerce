<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ==================Api===========================
// Route::middleware('auth')->group(function () {
// ===========================Auth==========================
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    // Route::post('/logout', 'logout');
});
// ===========================Product==========================
Route::middleware('apiAuth')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/{id}', 'productDetails');
        Route::post('/storeProduct', 'storeProduct');
        Route::put('/updateProduct/{id}', 'updateProduct');
        Route::delete('/deleteProduct/{id}', 'deleteProduct');
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// Route::get('/products', [ProductController::class, 'index']);
// // product details
// Route::get('/products/{id}', [ProductController::class, 'productDetails']);
// // store Product
// Route::post('/storeProduct', [ProductController::class, 'storeProduct']);
// // update Product
// Route::put('/updateProduct/{id}', [ProductController::class, 'updateProduct']);
// // delete Product
// Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
// Route::controller(AuthController::class)->group(function () {
//     Route::post('/register', 'register');
//     Route::post('/login', 'login');
// });



// ============================Cart==========================
// add to cart
// Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('user.addToCart');
// // remove from cart
// Route::delete('/removeFromCart/{id}', [CartController::class, 'removeFromCart'])->name('user.removeFromCart');
// // increase quantity
// Route::post('/increaseQuantity/{id}', [CartController::class, 'increaseQuantity'])->name('user.increaseQuantity');
// // decrease quantity
// Route::post('/decreaseQuantity/{id}', [CartController::class, 'decreaseQuantity'])->name('user.decreaseQuantity');
// // display cart
// Route::get("/cart", [CartController::class, 'showCart'])->name('user.showCart');
// // ============================Wishlist==========================
// Route::get("/wishlist", [WishlistController::class, 'showWishlist'])->name('user.showWishlist');
// // add to wishlist
// Route::post('/addToWishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('user.addToWishlist');
// // remove from wishlist
// Route::delete('/removeFromWishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('user.removeFromWishlist');
// });
// =============================Chckout==========================
// Route::middleware('auth')->group(function () {
//     Route::get('/checkoutOrder', [CheckoutController::class, 'checkout'])->name('user.checkout');
//     Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('order.place');
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
//     Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
// });
