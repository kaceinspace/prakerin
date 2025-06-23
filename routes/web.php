<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\MyController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route basic
Route::get('about', function () {
    return 'ini Halaman About';
});

Route::get('profile', function () {

    return view('profile');
});

// Route Parameter (di tandai {})
Route::get('produk/{namaProduk}', function ($a) {
    return 'Saya Membeli <b>' . $a . '</b>';
});

Route::get('beli/{barang}/{jumlah}', function ($a, $b) {
    return view('beli', compact('a', 'b'));
});

// Route Optional Parameter
Route::get('kategori/{namaKategori?}', function ($nama = null) {
    if ($nama) {
        return 'Anda Memilih Kategori: ' . $nama;
    } else {
        return 'Anda belum memilih Kategori!';
    }

});

Route::get('promo/{barang?}/{kode?}', function ($a = null, $b = null) {
    return view('promo', compact('a', 'b'));

});

// Route Siswa

Route::get('siswa', [MyController::class, 'index']);
// create
Route::get('siswa/create', [MyController::class, 'create']);
Route::post('/siswa', [MyController::class, 'store']);
// show
Route::get('siswa/{id}', [MyController::class, 'show']);

// edit data
Route::get('siswa/{id}/edit', [MyController::class, 'edit']);
Route::put('siswa/{id}', [MyController::class, 'update']);

// delete
Route::delete('siswa/{id}', [MyController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// import middleware
// Route Admin / Backend
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);

});
