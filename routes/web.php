<?php

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
