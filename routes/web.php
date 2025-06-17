<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Routes untuk login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Routes untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\LogController;
// Group routes yang butuh autentikasi
Route::middleware(['auth'])->group(function () {
    // Arahkan home ke log aktivitas
    Route::get('/home', function () {
        return redirect('/log');
    });

    Route::get('/log', [LogController::class, 'index']);
});

use App\Http\Controllers\BarangMasukController;
    Route::get('/masuk', [BarangMasukController::class, 'index']);
    Route::post('/masuk', [BarangMasukController::class, 'store']);

use App\Http\Controllers\BarangKeluarController;
    Route::get('/keluar', [BarangKeluarController::class, 'index']);
    Route::post('/keluar', [BarangKeluarController::class, 'store']);

    // BarangController untuk mengelola stok barang
use App\Http\Controllers\BarangController;
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
