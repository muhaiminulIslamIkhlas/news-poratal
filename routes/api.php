<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/**
 * default
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * category
 */
Route::get('/category', [App\Http\Controllers\API\NewsController::class, 'getCategory']);
/**
 * vote
 */
Route::get('/vote-result', [App\Http\Controllers\API\VoteController::class, 'getVote']);
Route::get('/give-vote/{id}/{vote}', [App\Http\Controllers\API\VoteController::class, 'giveVote']);
Route::get('/change-vote/{id}/{prev}/{new}', [App\Http\Controllers\API\VoteController::class, 'changeVote']);

/**
 * news
 */
Route::get('/get-all-news/{categoryId}/{type}/{limit}', [App\Http\Controllers\API\NewsController::class, 'getAllNews']);
Route::get('/get-news/{id}', [App\Http\Controllers\API\NewsController::class, 'getNews']);
Route::get('/get-news-by-category/{categoryId}/{limit}', [App\Http\Controllers\API\NewsController::class, 'getAllNewsByCategory']);
Route::get('/get-news-by-sub-category/{subCategoryId}/{limit}', [App\Http\Controllers\API\NewsController::class, 'getAllNewsBySubCategory']);

/**
 * opinion
 */
Route::get('/get-all-opinion/{limit}',[App\Http\Controllers\API\OpinionController::class, 'getAllOpinion']);
Route::get('/get-opinion/{id}',[App\Http\Controllers\API\OpinionController::class, 'getOpinion']);

/**
 * video
 */
Route::get('/get-all-video/{limit}',[App\Http\Controllers\API\VideoController::class, 'getAllVideo']);
Route::get('/get-video/{id}',[App\Http\Controllers\API\VideoController::class, 'getVideo']);

/**
 * image
 */
Route::get('/get-all-image/{limit}',[App\Http\Controllers\API\ImageController::class, 'getAllImage']);
Route::get('/get-image/{id}',[App\Http\Controllers\API\ImageController::class, 'getImage']);

/**
 * Info
 */
Route::get('/get-all-info',[App\Http\Controllers\API\InformationController::class, 'getAllInfo']);

/**
 * Sorbadhik
 */
Route::get('/get-all-sorbadhik/{limit}/{date?}',[App\Http\Controllers\API\LatestController::class, 'getAllSorbadhik']);

/**
 * latest
 */
Route::get('/get-all-latest/{limit}/{date?}',[App\Http\Controllers\API\LatestController::class, 'getAllLatest']);

/**
 * contact
 */
Route::get('/get-all-contact/{limit}',[App\Http\Controllers\API\ContactController::class, 'getAllContact']);
Route::get('/get-contact/{id}',[App\Http\Controllers\API\ContactController::class, 'getContact']);

/**
 * Search
 */
Route::get('/get-all-divisions',[App\Http\Controllers\API\SearchController::class, 'getDivsions']);
Route::get('/get-all-district-by-division/{divisionId}',[App\Http\Controllers\API\SearchController::class, 'getDistrictByDivision']);
Route::get('/get-all-upozilla-by-district/{districtId}',[App\Http\Controllers\API\SearchController::class, 'getUpozillaByDivision']);
Route::get('/get-filter-news/{divisionId}/{districtId?}/{upozillaId?}',[App\Http\Controllers\API\SearchController::class, 'filterNews']);
/**
 * Weare
 */
Route::get('/get-all-weare',[App\Http\Controllers\API\WeAreController::class, 'getAllWeAre']);
/**
 * archive
 */
Route::group(['prefix' => 'archive'], function () {
    Route::get('index/{limit}/{skip?}', [\App\Http\Controllers\API\ArchiveController::class, 'index']);
    Route::post('filter', [\App\Http\Controllers\API\ArchiveController::class, 'filter']);
});