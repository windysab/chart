<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController; // Add this line
use App\Http\Controllers\TestDBController; // Add this line
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test-db', [TestDBController::class, 'index']);


Route::get('/chart', [ChartController::class, 'showChart']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
