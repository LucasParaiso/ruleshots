<?php

use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiDrinksController;

Route::apiResource('users', ApiUsersController::class);
Route::apiResource('drinks', ApiDrinksController::class);
