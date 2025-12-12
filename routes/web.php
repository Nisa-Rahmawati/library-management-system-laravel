<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

// Halaman utama (opsional)
Route::get('/', function () {
    return redirect()->route('buku.index');
});

// Semua route CRUD buku otomatis
Route::resource('buku', BukuController::class);
