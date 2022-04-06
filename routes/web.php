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
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);
    Route::group(['prefix' => 'news'], function () {
        Route::get('index', [\App\Http\Controllers\NewsController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\NewsController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\NewsController::class, 'store']);
        Route::post('update', [\App\Http\Controllers\NewsController::class, 'update']);
        Route::get('get-district/{divisionID}', [\App\Http\Controllers\NewsController::class, 'getDistrictByDivId']);
        Route::get('get-upozilla/{districtID}', [\App\Http\Controllers\NewsController::class, 'getUpozillaByDisId']);


        Route::get('create-by-category/{categoryId}/{categoryName}', [\App\Http\Controllers\NewsController::class, 'createByCategory']);
        Route::get('index-by-category/{categoryId}/{categoryName}', [\App\Http\Controllers\NewsController::class, 'getList']);
        Route::get('delete/{newsId}/', [\App\Http\Controllers\NewsController::class, 'delete']);
        Route::get('edit/{newsId}/{categoryName}', [\App\Http\Controllers\NewsController::class, 'edit']);
        Route::get('view/{newsId}/', [\App\Http\Controllers\NewsController::class, 'view']);
        Route::get('keyword-by-id/{newsId}/', [\App\Http\Controllers\NewsController::class, 'getKeyWord']);

        Route::group(['prefix' => 'category'], function () {
            Route::get('index', [\App\Http\Controllers\Category::class, 'index']);
            Route::post('create', [\App\Http\Controllers\Category::class, 'create']);
            Route::get('list', [\App\Http\Controllers\Category::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\Category::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\Category::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\Category::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\Category::class, 'delete']);
            Route::get('visible/{id}', [\App\Http\Controllers\Category::class, 'visible']);
            Route::get('invisible/{id}', [\App\Http\Controllers\Category::class, 'invisible']);
        });

        Route::group(['prefix' => 'subcategory'], function () {
            Route::get('index', [\App\Http\Controllers\Subcategory::class, 'index']);
            Route::post('create', [\App\Http\Controllers\Subcategory::class, 'create']);
            Route::get('list', [\App\Http\Controllers\Subcategory::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\Subcategory::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\Subcategory::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\Subcategory::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\Subcategory::class, 'delete']);
            Route::get('get-sub-category/{categoryId}', [\App\Http\Controllers\Subcategory::class, 'getSubCategory']);
            Route::get('visible/{id}', [\App\Http\Controllers\Subcategory::class, 'visible']);
            Route::get('invisible/{id}', [\App\Http\Controllers\Subcategory::class, 'invisible']);

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

        Route::group(['prefix' => 'video'], function () {
            Route::get('index', [\App\Http\Controllers\VideoController::class, 'index']);
            Route::post('create', [\App\Http\Controllers\VideoController::class, 'create']);
            Route::get('list', [\App\Http\Controllers\VideoController::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\VideoController::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\VideoController::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\VideoController::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\VideoController::class, 'delete']);
        });


        Route::group(['prefix' => 'image'], function () {
            Route::get('index', [\App\Http\Controllers\ImageController::class, 'index']);
            Route::post('create', [\App\Http\Controllers\ImageController::class, 'create']);
            Route::get('list', [\App\Http\Controllers\ImageController::class, 'list']);
            Route::get('view/{id}', [\App\Http\Controllers\ImageController::class, 'view']);
            Route::get('edit/{id}', [\App\Http\Controllers\ImageController::class, 'edit']);
            Route::post('update', [\App\Http\Controllers\ImageController::class, 'update']);
            Route::get('delete/{id}', [\App\Http\Controllers\ImageController::class, 'delete']);
        });

    });
    Route::group(['prefix' => 'vote'], function () {
        Route::get('index', [\App\Http\Controllers\VoteController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\VoteController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\VoteController::class, 'store']);
        Route::get('list', [\App\Http\Controllers\VoteController::class, 'list']);
        Route::get('edit/{id}', [\App\Http\Controllers\VoteController::class, 'edit']);
        Route::post('update', [\App\Http\Controllers\VoteController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\VoteController::class, 'delete']);
    });
    Route::group(['prefix' => 'opinion'], function () {
        Route::get('index', [\App\Http\Controllers\OpinionController::class, 'index']);
        Route::post('create', [\App\Http\Controllers\OpinionController::class, 'create']);
        Route::get('list', [\App\Http\Controllers\OpinionController::class, 'list']);
        Route::get('view/{id}', [\App\Http\Controllers\OpinionController::class, 'view']);
        Route::get('edit/{id}', [\App\Http\Controllers\OpinionController::class, 'edit']);
        Route::post('update', [\App\Http\Controllers\OpinionController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\OpinionController::class, 'delete']);
    });

    Route::group(['prefix' => 'information'], function () {
        Route::get('index', [\App\Http\Controllers\InformationController::class, 'index']);
        Route::get('edit', [\App\Http\Controllers\InformationController::class, 'edit']);
        Route::post('store', [\App\Http\Controllers\InformationController::class, 'update']);
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('index', [\App\Http\Controllers\ContactController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\ContactController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\ContactController::class, 'store']);
        Route::get('delete/{id}', [\App\Http\Controllers\ContactController::class, 'delete']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('index', [\App\Http\Controllers\UserController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\UserController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\UserController::class, 'store']);
        Route::get('delete/{id}', [\App\Http\Controllers\UserController::class, 'delete']);
    });
    Route::group(['prefix' => 'designation'], function () {
        Route::get('index', [\App\Http\Controllers\DesignationController::class, 'index']);
        Route::post('store', [\App\Http\Controllers\DesignationController::class, 'store']);
        Route::get('delete/{id}', [\App\Http\Controllers\DesignationController::class, 'delete']);
    });
    Route::group(['prefix' => 'weare'], function () {
        Route::get('index', [\App\Http\Controllers\WeAreController::class, 'index']);
        Route::get('create', [\App\Http\Controllers\WeAreController::class, 'create']);
        Route::get('edit/{id}', [\App\Http\Controllers\WeAreController::class, 'edit']);
        Route::post('store', [\App\Http\Controllers\WeAreController::class, 'store']);
        Route::post('update/', [\App\Http\Controllers\WeAreController::class, 'update']);
        Route::get('delete/{id}', [\App\Http\Controllers\WeAreController::class, 'delete']);
    });


});

require __DIR__.'/auth.php';
