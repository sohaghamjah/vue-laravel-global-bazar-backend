<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\WishlistController;
use App\Http\Controllers\Api\V1\Admin\DistrictController;
use App\Http\Controllers\Api\V1\Admin\DivisionController;

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

Route::controller(DivisionController::class)->group(function () {
    Route::get('divisions', 'index');
});
Route::controller(DistrictController::class)->group(function () {
    Route::get('district/{division}',  'districtById');
});