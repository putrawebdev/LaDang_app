<?php

use App\Livewire\Auth\Login;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login')->middleware('guest');
Route::post('/logout', AuthController::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    // Route untuk Super Admin
    Route::middleware(['superadmin'])->group(function () {
        Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user')->middleware('superadmin');
        Route::view('superadmin/kategori', 'superadmin.kategori.index')->name('superadmin.kategori');
    });
    
    // Route untuk semua user terautentikasi
    Route::view('superadmin/barang', 'superadmin.barang.index')->name('superadmin.barang');
    
    // Tidak perlu route POST untuk logout karena menggunakan Livewire
});

