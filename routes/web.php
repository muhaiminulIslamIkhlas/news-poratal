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
Route::group(['prefix' => 'admin'], function () {
   Route::group(['prefix' => 'news'], function () {
       Route::get('index', [\App\Http\Controllers\NewsController::class, 'index']);
       Route::get('create', [\App\Http\Controllers\NewsController::class, 'create']);


        Route::group(['prefix' => 'category'], function () {
            Route::get('index', [\App\Http\Controllers\Category::class, 'index']);
            Route::post('create', [\App\Http\Controllers\Category::class, 'create']);
            Route::get('list', [\App\Http\Controllers\Category::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\Category::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\Category::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\Category::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\Category::class, 'delete']);
        });

        Route::group(['prefix' => 'subcategory'], function () {
            Route::get('index', [\App\Http\Controllers\Subcategory::class, 'index']);
            Route::post('create', [\App\Http\Controllers\Subcategory::class, 'create']);
            Route::get('list', [\App\Http\Controllers\Subcategory::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\Subcategory::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\Subcategory::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\Subcategory::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\Subcategory::class, 'delete']);
            Route::get('get-sub-category/{categoryId}',[\App\Http\Controllers\Subcategory::class, 'getSubCategory']);
        });

        Route::group(['prefix' => 'keyword'], function () {
            Route::get('index', [\App\Http\Controllers\Keyword::class, 'index']);
            Route::post('create', [\App\Http\Controllers\Keyword::class, 'create']);
            Route::get('list', [\App\Http\Controllers\Keyword::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\Keyword::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\Keyword::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\Keyword::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\Keyword::class, 'delete']);
        });
   });
});


Route::get('/',[\App\Http\Controllers\NewsController::class,'index']);
