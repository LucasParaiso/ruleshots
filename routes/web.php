<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ConfigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth', 'verified'])->group(function () {
    // Default
    Route::get('/', [StockController::class, 'index']);

    // User
    Route::resource('user', UserController::class)->except(['index', 'create', 'store']);

    // Stock
    Route::put('stock/shot/{stock}', [StockController::class, 'updateShotRemaining'])->name('stock.updateShot');
    Route::resource('stock', StockController::class);

    // Report
    Route::get('/report/download', [ReportController::class, 'download'])->name('report.download');
    Route::resource('report', ReportController::class);

    // Config
    Route::resource('config', ConfigController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
