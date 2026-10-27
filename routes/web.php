<?php

use App\Http\Controllers\Admin\AturanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\HasilIdentifikasiController;
use App\Http\Controllers\Admin\TingkatInsomniaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IdentifikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman publik: alur identifikasi mahasiswa (3 langkah)
|--------------------------------------------------------------------------
*/
Route::get('/', [IdentifikasiController::class, 'dataDiri'])->name('home');

Route::prefix('identifikasi')->name('identifikasi.')->group(function () {
    Route::get('/', [IdentifikasiController::class, 'dataDiri'])->name('dataDiri');
    Route::post('/data-diri', [IdentifikasiController::class, 'simpanDataDiri'])->name('simpanDataDiri');
    Route::get('/gejala', [IdentifikasiController::class, 'pilihGejala'])->name('gejala');
    Route::post('/proses', [IdentifikasiController::class, 'proses'])->name('proses');
    Route::get('/hasil/{hasil}', [IdentifikasiController::class, 'hasil'])->name('hasil');
});

/*
|--------------------------------------------------------------------------
| Login Admin/Pakar
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Area Admin/Pakar (butuh login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('gejala', GejalaController::class)->except('show');
    Route::resource('tingkat', TingkatInsomniaController::class)->except('show');
    Route::resource('aturan', AturanController::class)->except('show');

    Route::get('hasil', [HasilIdentifikasiController::class, 'index'])->name('hasil.index');
    Route::get('hasil/{hasil}', [HasilIdentifikasiController::class, 'show'])->name('hasil.show');
    Route::delete('hasil/{hasil}', [HasilIdentifikasiController::class, 'destroy'])->name('hasil.destroy');
});
