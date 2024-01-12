<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\WishlistController;
use App\Http\Controllers\Api\V1\Admin\DistrictController;
use App\Http\Controllers\Api\V1\Admin\DivisionController;
use App\Http\Controllers\Api\V1\Admin\OrderController;
use App\Http\Controllers\Api\V1\CouponController;
use App\Http\Controllers\Api\V1\User\ProfileController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:user-api')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/logout', 'logout');
        Route::get('/me', 'user');
        Route::post('/address/store', 'addressStore');
        Route::post('/get/address', 'getAddress');
    });

    Route::controller(WishlistController::class)->prefix('wishlist')->group(function(){
        Route::get('/', 'index');
        Route::post('/store', 'store');
    });
    
    Route::post('place-order', [OrderController::class, 'placeOrder']);
    Route::post('apply-coupon', [CouponController::class, 'applyCoupon']);
    Route::get('my/orders', [ProfileController::class, 'getOrders']);
});

Route::controller(DivisionController::class)->group(function () {
    Route::get('divisions', 'index');
});

Route::controller(DistrictController::class)->group(function () {
    Route::get('/districts/{division}',  'districtById');
});