<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user');
Route::view('superadmin/kategori', 'superadmin.kategori.index')->name('superadmin.kategori');
Route::view('superadmin/barang', 'superadmin.barang.index')->name('superadmin.barang');