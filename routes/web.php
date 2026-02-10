<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\AspirasiController;



Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route:: post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');
    Route::resource('kategori', KategoriController::class);
    Route::resource('aspirasi', AspirasiController::class);
});

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/home', function () {
        return view('siswa.home');
    })->name('home');
    Route::resource('aspirasi', InputAspirasiController::class);
});