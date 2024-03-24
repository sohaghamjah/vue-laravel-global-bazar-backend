<?php

use App\Http\Controllers\Api\FileManagerController;
use App\Http\Controllers\Api\V1\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:admin-api')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/logout', 'logout');
        Route::get('/me', 'user');
    });

    Route::controller(FileManagerController::class)->prefix('file-manager')->group(function () {
        Route::get('/index', 'index');
        Route::post('/upload', 'upload');
        Route::delete('/delete/{id}', 'delete');
    });

});