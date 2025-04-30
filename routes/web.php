<?php

use App\Http\Controllers\PeriksaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\MemeriksaController;

/* Halaman Awal */
Route::get('/', function () {
    return view('landingpage');
});

/* Login, Register & Logout*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Dashboard umum (bisa kamu kembangkan lagi)
// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/tables', [DashboardController::class, 'tables']);

/* Setelah Login (Dibatasi auth) */
Route::middleware('auth')->group(function () {

    // Dashboard umum (bisa kamu kembangkan lagi)
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/tables', [DashboardController::class, 'tables']);

    Route::middleware('role:pasien')->group(function () {
        /* --------- Pasien --------- */
        Route::get('/pasien', function () {
            return view('pasien.dashboard');
        })->name('pasien.dashboard');

        Route::get('/pasien/periksa', [PeriksaController::class, 'index'])->name('pasien.periksa');
        Route::post('/pasien/periksa', [PeriksaController::class, 'store'])->name('pasien.periksa.store');
        Route::get('/pasien/riwayat', function () {
            return view('pasien.riwayat');
        })->name('pasien.riwayat');
    });

    Route::middleware('role:dokter')->group(function () {
        Route::get('/dokter', function () {
            return view('dokter.dashboard'); // ini akan arahkan ke blade
        })->middleware('auth')->name('dokter.dashboard');

        Route::get('/dokter/memeriksa', [MemeriksaController::class, 'index'])->name('dokter.memeriksa');
        Route::get('/dokter/memeriksa/{id}', [MemeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::put('/dokter/memeriksa/{id}', [MemeriksaController::class, 'update'])->name('dokter.memeriksa.update');
        Route::put('/dokter/memeriksa/{id}/status', [MemeriksaController::class, 'updateStatus'])->name('dokter.memeriksa.status');

        Route::get('/dokter/obat', [ObatController::class, 'index'])->name('dokter.obat');
        Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');
    });

    Route::get('no-access', function () {
        return view('errors.403');
    });
});