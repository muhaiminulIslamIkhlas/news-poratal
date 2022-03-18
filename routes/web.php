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
//
//Route::group(['prefix' => 'admin'], function () {
//    Route::group(['prefix' => 'news'], function () {
//        Route::get('index', [\App\Http\Controllers\NewsController::class, 'index']);
//        Route::get('create', [\App\Http\Controllers\NewsController::class, 'create']);
//    });
//});


Route::get('/',[\App\Http\Controllers\NewsController::class,'index']);
