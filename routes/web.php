<?php

use App\Http\Controllers\PeriksaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\RiwayatPasienController;

Route::middleware(['web'])->group(function () {
    /* Halaman Awal */
    Route::get('/', function () {
        return view('landing');
    })->name('landing');

    /* Login, Register & Logout*/
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        // Dashboard umum
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/tables', [DashboardController::class, 'tables']);

        Route::middleware('role:pasien')->group(function () {
            Route::get('/pasien/dashboard', [DashboardController::class, 'pasien'])->name('pasien.dashboard');
            Route::get('/pasien/periksa', [PeriksaController::class, 'index'])->name('pasien.periksa');
            Route::get('/pasien/get-jadwal/{poliId}', [PeriksaController::class, 'getJadwal'])->name('pasien.get-jadwal');
            Route::post('/pasien/periksa', [PeriksaController::class, 'store'])->name('pasien.periksa.store');
            Route::delete('/pasien/periksa/{id}', [PeriksaController::class, 'batal'])->name('pasien.periksa.batal');
        });

        Route::middleware('role:dokter')->group(function () {
            Route::get('/dokter', function () {
                return view('dokter.dashboard');
            })->name('dokter.dashboard');

            Route::get('/dokter/memeriksa', [MemeriksaController::class, 'index'])->name('dokter.memeriksa');
            Route::get('/dokter/memeriksa/{id}', [MemeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
            Route::put('/dokter/memeriksa/{id}', [MemeriksaController::class, 'update'])->name('dokter.memeriksa.update');
            Route::put('/dokter/memeriksa/{id}/status', [MemeriksaController::class, 'updateStatus'])->name('dokter.memeriksa.status');

            // Tambahkan route untuk riwayat pasien
            Route::get('/dokter/riwayat-pasien', [RiwayatPasienController::class, 'index'])->name('dokter.riwayat-pasien');
            Route::get('/dokter/riwayat-pasien/{id}', [RiwayatPasienController::class, 'detail'])->name('dokter.riwayat-pasien.detail');

            // Jadwal Periksa
            Route::resource('dokter/jadwal-periksa', JadwalPeriksaController::class)->names([
                'index' => 'dokter.jadwal-periksa.index',
                'create' => 'dokter.jadwal-periksa.create',
                'store' => 'dokter.jadwal-periksa.store',
                'edit' => 'dokter.jadwal-periksa.edit',
                'update' => 'dokter.jadwal-periksa.update',
                'destroy' => 'dokter.jadwal-periksa.destroy'
            ]);
        });

        Route::middleware('role:admin')->group(function () {
            Route::prefix('admin')->name('admin.')->group(function () {
                Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
                Route::resource('dokter', DokterController::class);
                Route::resource('poli', PoliController::class);
                Route::resource('obat', AdminObatController::class);
                Route::resource('pasien', PasienController::class);
            });
        });

        Route::get('no-access', function () {
            return view('errors.403');
        });
=======
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
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    });
});