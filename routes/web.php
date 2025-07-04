<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAddOrderController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\UserOrders\UserOrderController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteUri;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route(auth()->user()->role === 'admin' ? 'dashboard.home' : 'user.home');
    }
    return view('auth.login');
});

// Authentication routes
Auth::routes();

// Route::middleware('throttle:5,1')->group(function () {
// });
Route::middleware('web')->group(function () {
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

    Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

    Route::get('auth/github', [SocialController::class, 'redirectToGitHub']);
    Route::get('auth/github/callback', [SocialController::class, 'handleGitHubCallback']);
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/home', [AdminAddOrderController::class, 'index'])->name('dashboard.home');
});


// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    // home 
    Route::get('/user/home', function () {
        return view('user.home');
    })->name('user.home');


    // my orders page(for user)
    Route::get('/user/myOrders', [UserOrderController::class, 'index'])
    ->name('user.orders');
    Route::get('/user/myOrders/{id}', [UserOrderController::class, 'show'])
    ->name('user.orders.show');
    Route::post('/user/myOrders/{id}/cancel', [UserOrderController::class, 'cancel'])
    ->name('user.orders.cancel');  



    // menu(just display categories and products)
    Route::get('/menu', [CategoryController::class, 'home'])->name('user.menu');

    // Route::get('/user/myOrders', function () {
    //     return view('user.orders');
    // })->name('user.orders');
});

Route::get('/admin-add-order', [AdminAddOrderController::class, 'index'])->name('products');
Route::get('/add-to-cart/{id}', [AdminAddOrderController::class, 'addToCart'])->name('addtocart');
Route::get('/removefromcart/{id}', [AdminAddOrderController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/cart/decrease-quantity/{id}', [AdminAddOrderController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::get('/cart/increase-quantity/{id}', [AdminAddOrderController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/admin-add-order/addorder', [AdminAddOrderController::class, 'store'])->name('addOrder');





// admin products
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});






//  admin categories
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [UserOrderController::class, 'show'])->name('orders.show');
    Route::post('/my-orders/{order}/cancel', [UserOrderController::class, 'cancel'])->name('orders.cancel');
});
