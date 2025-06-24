<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Route guest (tamu) / member
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/product/{product}', [FrontendController::class, 'singleProduct']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/cart', [FrontendController::class, 'cart']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// import middleware
// Route Admin / Backend
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
    // crud
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);

});
