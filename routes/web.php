<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaHomeController;


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('siswa', SiswaController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('aspirasi', AspirasiController::class);
});

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/home', [SiswaHomeController::class, 'index'])->name('home');
    Route::resource('aspirasi', InputAspirasiController::class);
});

