<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('seller.app');
});

Route::get('/admin/login', function () {
    return view('admin.app');
});


Route::get('admin/{any}', function(){
    return view(('admin.app'));
})->where('any', '.*');

Route::get('seller/{any}', function(){
    return view(('seller.app'));
})->where('any', '.*');