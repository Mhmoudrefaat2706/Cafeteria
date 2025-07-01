<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAddOrderController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/admin-add-order', [AdminAddOrderController::class, 'index'])->name('products');
Route::get('/add-to-cart/{id}', [AdminAddOrderController::class, 'addToCart'])->name('addtocart');
Route::get('/removefromcart/{id}', [AdminAddOrderController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/cart/decrease-quantity/{id}', [AdminAddOrderController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::get('/cart/increase-quantity/{id}', [AdminAddOrderController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/admin-add-order/addorder', [AdminAddOrderController::class, 'store'])->name('addOrder');
// Route::get('/search-product',[AdminAddOrderController::class,'searchProduct'])->name('searchProduct');