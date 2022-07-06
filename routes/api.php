<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/register', RegisterController::class);
    Route::post('/login', LoginController::class);
});
