<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagePasienController;
use App\Http\Controllers\ProsesManageController;
use App\Http\Controllers\PrintController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route Login Form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route Register Form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);  

// Route dashboard (harus login dulu)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/pemeriksaan', [PemeriksaanController::class, 'index'])->name('pemeriksaan.index');
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/reg-pasien', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/reg-pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/pasien/manage', [ManagePasienController::class, 'index'])->name('pasien.manage.index');
    Route::get('/pemeriksaan/proses/{id}', [ProsesManageController::class, 'edit'])->name('pemeriksaan.proses');
    Route::post('/pemeriksaan/store/{id}', [ProsesManageController::class, 'store'])->name('pemeriksaan.store');
    Route::post('/pemeriksaan/update/{id}', [ProsesManageController::class, 'update'])->name('pemeriksaan.update');
    Route::get('/print/hasil', [PrintController::class, 'print_hasil'])->name('print.hasil');
    Route::get('/print/kwitansi', [PrintController::class, 'print_kwitansi'])->name('print.kwitansi');
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::delete('/pemeriksaan/proses/{id}', [ProsesManageController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/pemeriksaan/{id}/edit', [PemeriksaanController::class, 'edit'])->name('periksa.edit');
    Route::put('/pemeriksaan/{id}', [PemeriksaanController::class, 'update'])->name('periksa.update');
    Route::get('/pemeriksaan/add', [PemeriksaanController::class, 'addMetode'])->name('periksa.add');
    Route::post('/pemeriksaan/add', [PemeriksaanController::class, 'store'])->name('periksa.store');
    Route::delete('/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy'])->name('periksa.destroy');

    
});

// Route Log out
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');