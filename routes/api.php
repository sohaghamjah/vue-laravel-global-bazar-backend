<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Seller\SellerController;
use App\Http\Controllers\Api\V1\Admin\SliderController;
use App\Http\Controllers\Api\V1\Admin\ProductController;
use App\Http\Controllers\Api\V1\Admin\CategoryController;

Route::prefix('v1')->group(function () {
    Route::get('sliders', [SliderController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('sellers', [SellerController::class, 'index']);
});