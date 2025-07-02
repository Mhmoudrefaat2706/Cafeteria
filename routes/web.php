<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAddOrderController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\user\UserOrderController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');




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
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/home', [AdminAddOrderController::class, 'index'])->name('dashboard.home');
    Route::get('/admin-add-order', [AdminAddOrderController::class, 'index'])->name('products');
    Route::get('/add-to-cart/{id}', [AdminAddOrderController::class, 'addToCart'])->name('addtocart');
    Route::get('/removefromcart/{id}', [AdminAddOrderController::class, 'removeFromCart'])->name('removeFromCart');
    Route::get('/cart/decrease-quantity/{id}', [AdminAddOrderController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::get('/cart/increase-quantity/{id}', [AdminAddOrderController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::post('/admin-add-order/addorder', [AdminAddOrderController::class, 'store'])->name('addOrder');
});


// User Routes


Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [UserOrderController::class, 'index'])->name('user.home');
    Route::get('/add-to-cart/{id}', [UserOrderController::class, 'addToCart'])->name('user.addToCart');
    Route::get('/increase/{id}', [UserOrderController::class, 'increaseQuantity'])->name('user.increaseQuantity');
    Route::get('/decrease/{id}', [UserOrderController::class, 'decreaseQuantity'])->name('user.decreaseQuantity');
    Route::get('/remove/{id}', [UserOrderController::class, 'removeFromCart'])->name('user.removeFromCart');
    Route::post('/order', [UserOrderController::class, 'store'])->name('user.addOrder');
});
