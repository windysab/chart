<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TestDBController;
use App\Http\Controllers\RealisasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blank-page', ['type_menu' => 'dashboard']);
});

Route::get('/test-db', [TestDBController::class, 'index']);

Route::get('/chart', [ChartController::class, 'showChart']);

Route::get('/realisasi', [RealisasiController::class, 'index']);


Route::get('/realisasi/data', [RealisasiController::class, 'getData']);

Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// Resource route for RealisasiController
Route::resource('realisasi', RealisasiController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
