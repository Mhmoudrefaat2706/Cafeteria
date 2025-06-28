<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAddOrderController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',function(){
    return view('dashboard.index');
});

Route::get('/admin-add-order',[AdminAddOrderController::class,'index']);