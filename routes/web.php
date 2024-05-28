<?php

use App\Http\Controllers\KamarsController;
use Illuminate\Support\Facades\Route;

// routes web
Route::get('/', [KamarsController::class, 'home'])->name('home');
Route::get('/about', [KamarsController::class, 'about'])->name('about');
Route::get('/pesan', [KamarsController::class, 'pesan_form'])->name('pesan_form');
Route::get('/pricelist', [KamarsController::class, 'pricelist'])->name('pricelist');
Route::post('/pesan', [KamarsController::class, 'create_pesan'])->name('create_pesan');

// cek pesanan by id
Route::get('/api/cekPesanan/{id}', [KamarsController::class, 'cek_pesanan'])->name('cek_pesanan');

// cek kamar by id
Route::get('/api/kamar/{id}', [KamarsController::class, 'kamar'])->name('kamar');

// 404 content
Route::fallback(function () {
    return view('404');
});
