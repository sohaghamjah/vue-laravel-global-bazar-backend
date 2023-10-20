<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;

Route::prefix('v1')->group(function () {
    Route::get('sliders', [SliderController::class, 'index']);
});