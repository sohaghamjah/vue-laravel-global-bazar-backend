<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\WishlistController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:user-api')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/logout', 'logout');
        Route::get('/me', 'user');
    });

    Route::controller(WishlistController::class)->prefix('wishlist')->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
    });  
});