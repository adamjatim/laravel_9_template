<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SewaController;

// 📌 Route untuk Login & Logout
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'actionlogin'])->name('login.process')->middleware('guest');
Route::post('/logout', [LoginController::class, 'actionlogout'])->name('logout')->middleware('auth');

// 📌 Group Middleware Auth untuk halaman yang memerlukan login
Route::middleware(['auth'])->group(function () {

    // 📌 Routes yang hanya bisa diakses oleh ADMIN
    Route::middleware(['admin'])->group(function () {

        // 📌 Home (hanya bisa diakses jika sudah login)
        Route::get('/', function () {
            // return view('welcome');
            return redirect()->route('rentals.index');
        })->name('home')->middleware('auth');

        // 📌 Routes untuk Rentals
        Route::prefix('rentals')->name('rentals.')->group(function () {
            Route::get('/', [RentalController::class, 'index'])->name('index');
            Route::get('/create', [RentalController::class, 'create'])->name('create');
            Route::post('/', [RentalController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [RentalController::class, 'edit'])->name('edit');
            Route::put('/{id}', [RentalController::class, 'update'])->name('update');
            Route::delete('/{id}', [RentalController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [RentalController::class, 'show'])->name('show');
        });

        // 📌 Routes untuk Penyewa
        Route::prefix('penyewa')->name('penyewa.')->group(function () {
            Route::get('/', [PenyewaController::class, 'index'])->name('index');
            Route::get('/create', [PenyewaController::class, 'create'])->name('create');
            Route::post('/', [PenyewaController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PenyewaController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PenyewaController::class, 'update'])->name('update');
            Route::delete('/{id}', [PenyewaController::class, 'destroy'])->name('destroy');
        });

        // 📌 Routes untuk Cars
        Route::prefix('cars')->name('cars.')->group(function () {
            Route::get('/', [CarController::class, 'index'])->name('index');
            Route::get('/create', [CarController::class, 'create'])->name('create');
            Route::post('/', [CarController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [CarController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CarController::class, 'update'])->name('update');
            Route::delete('/{id}', [CarController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [CarController::class, 'show'])->name('show');
        });
    });

    // 📌 Home (hanya bisa diakses jika sudah login)
    Route::get('/', function () {
        // return view('welcome');
        return redirect()->route('sewa.index');
    })->name('home')->middleware('auth');

    // 📌 Routes untuk Mobils
    Route::prefix('mobils')->name('mobils.')->group(function () {
        Route::get('/', [SewaController::class, 'index'])->name('index');
        Route::get('/create', [SewaController::class, 'create'])->name('create');
        Route::post('/', [SewaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SewaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SewaController::class, 'update'])->name('update');
        Route::delete('/{id}', [SewaController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [SewaController::class, 'show'])->name('show');
    });

    // 📌 Routes untuk Sewa
    Route::prefix('sewa')->name('sewa.')->group(function () {
        Route::get('/', [SewaController::class, 'index'])->name('index');
        Route::get('/create', [SewaController::class, 'create'])->name('create');
        Route::post('/', [SewaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SewaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SewaController::class, 'update'])->name('update');
        Route::delete('/{id}', [SewaController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [SewaController::class, 'show'])->name('show');
    });
});
