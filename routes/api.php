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

Route::get('/category', [App\Http\Controllers\API\NewsController::class, 'getCategory']);
Route::get('/vote-result', [App\Http\Controllers\API\VoteController::class, 'getVote']);
Route::get('/give-vote/{id}/{vote}', [App\Http\Controllers\API\VoteController::class, 'giveVote']);
Route::get('/news/{categoryId}/{type}/{limit}', [App\Http\Controllers\API\NewsController::class, 'getNews']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
