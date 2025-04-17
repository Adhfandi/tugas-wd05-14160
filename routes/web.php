<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/login', [DashboardController::class, 'login']);
Route::get('/register', [DashboardController::class, 'register']);
Route::get('/dokter', [DashboardController::class, 'dokter']);
Route::get('/dokter/obat', [DashboardController::class, 'obat']);
Route::get('/dokter/periksa', [DashboardController::class, 'dokterperiksa']);
Route::get('/pasien', [DashboardController::class, 'pasien']);
Route::get('/pasien/periksa', [DashboardController::class, 'pasienperiksa']);
Route::get('/pasien/riwayat', [DashboardController::class, 'pasienriwayat']);