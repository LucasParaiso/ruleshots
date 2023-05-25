<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

//User Rote
Route::resource('login', UserController::class)->only(['index']);
Route::resource('register', UserController::class)->only(['create', 'store']);
Route::post('auth', [UserController::class, 'authenticate'])->name('auth.user');

Route::middleware(['authenticate'])->group(function () {
    //Default Rote
    Route::get('/', [StockController::class, 'index']);

    //User Rote
    Route::resource('user', UserController::class)->except(['index', 'create', 'store']);
    Route::post('logout', [UserController::class, 'logout'])->name('auth.logout');

    //Stock Rote
    Route::put('stock/shot/{stock}', [StockController::class, 'updateShotRemaining'])->name('stock.updateShot');
    Route::resource('stock', StockController::class);

    //Report Rote
    Route::get('/report/download', [ReportController::class, 'download'])->name('report.download');
    Route::resource('report', ReportController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
