<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiDrinksController;
use Illuminate\Http\Request;

Route::post('login', [ApiController::class, 'login']);
Route::post('register', [ApiController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', ApiUsersController::class);
    Route::apiResource('drinks', ApiDrinksController::class);

    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
