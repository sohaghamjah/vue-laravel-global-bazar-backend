<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\SliderController;
use App\Http\Controllers\Api\V1\Admin\ProductController;
use App\Http\Controllers\Api\V1\Seller\SellerController;
use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\ShopController;

Route::prefix('v1')->group(function () {
    Route::get('sliders', [SliderController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('nav-categories', [CategoryController::class, 'navCategories']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/details/{slug}', [ProductController::class, 'productDetails']);
    Route::get('sellers', [SellerController::class, 'index']);
    Route::get('seller/products/{slug}', [SellerController::class, 'sellerProducts']);

    Route::get('shop-products', [ShopController::class, 'index']);
    Route::get('shop-sidebar', [ShopController::class, 'sidebarData']);
});