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

Route::get('get-news', [\App\Http\Controllers\NewsController::class, 'index']);
Route::get('get-favorites-news', [\App\Http\Controllers\NewsController::class, 'getFavoritesNews']);
Route::get('search-news', [\App\Http\Controllers\NewsController::class, 'searchNews']);
Route::get('get-region-news', [\App\Http\Controllers\NewsController::class, 'getRegionNews']);
Route::post('get-news-card', [\App\Http\Controllers\NewsController::class, 'getNewsCard']);
Route::post('save-status-favorites', [\App\Http\Controllers\NewsController::class, 'saveFavoritesStatus']);
