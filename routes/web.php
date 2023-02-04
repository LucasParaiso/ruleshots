<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Redirect;

/* PADRÃO */
Route::get('/', [Redirect::class, 'index']);
Route::get('/links', [Redirect::class, 'edit'])->name('links.list');
Route::post('/links', [Redirect::class, 'update'])->name('links.update');
Route::get('/links/form', [Redirect::class, 'form'])->name('links.form');
Route::post('/links/store', [Redirect::class, 'store'])->name('links.store');

/* DESCULPA */
Route::get('/desculpa', function () {
    return view('desculpa/desculpa');
});