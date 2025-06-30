<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Route guest (tamu) / member
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])
    ->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])
    ->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about', [FrontendController::class, 'about']);
// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
// orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// review
Route::post('/product/{product}/review', [ReviewController::class, 'store'])
    ->middleware('auth')->name('review.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin / Backend
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index'])->name('index');
    // crud
    Route::resource('/users', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    // add & delete image
    Route::post('/product/{product}/images', [ProductImageController::class, 'store'])->name('product.images.store');
    Route::delete('/product/images/{id}', [ProductImageController::class, 'destroy'])->name('product.images.destroy');

    Route::resource('/orders', BackendOrderController::class);
    Route::put('/orders/{id}/status', [BackendOrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/export-excel', [ReportController::class, 'exportExcel'])->name('report.export.excel');
    Route::get('/report/export-pdf', [ReportController::class, 'exportPDF'])->name('report.export.pdf');

});
