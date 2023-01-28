<?php

use App\Http\Controllers\Api\V1\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:user-api')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/logout', 'logout');
        Route::get('/me', 'user');
    });
});