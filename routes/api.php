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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/********** Cars **********/
Route::middleware('auth:sanctum')->get('/cars', 'App\Http\Controllers\CarApiController@getAllCars');
Route::middleware('auth:sanctum')->get('/cars/{id}', 'App\Http\Controllers\CarApiController@getCar');
Route::middleware('auth:sanctum')->post('cars', 'App\Http\Controllers\CarApiController@createCar');
Route::middleware('auth:sanctum')->put('cars/{id}', 'App\Http\Controllers\CarApiController@updateCar');
Route::middleware('auth:sanctum')->delete('cars/{id}', 'App\Http\Controllers\CarApiController@deleteCar');
Route::middleware('auth:sanctum')->get('/cars/{id}/images', 'App\Http\Controllers\CarApiController@getCarImages');

/********** Images **********/
Route::middleware('auth:sanctum')->get('images/{id}', 'App\Http\Controllers\ImageApiController@getImage');
Route::middleware('auth:sanctum')->get('images/{id}/details', 'App\Http\Controllers\ImageApiController@getImageDetails');
Route::middleware('auth:sanctum')->post('images', 'App\Http\Controllers\ImageApiController@createImage');
Route::middleware('auth:sanctum')->put('images/{id}', 'App\Http\Controllers\ImageApiController@updateImage');
Route::middleware('auth:sanctum')->delete('images/{id}', 'App\Http\Controllers\ImageApiController@deleteImage');

/********** Thumbnails **********/
Route::middleware('auth:sanctum')->get('images/{id}/thumbnail', 'App\Http\Controllers\ImageApiController@getThumbnail');
Route::middleware('auth:sanctum')->get('images/{id}/thumbnail/details', 'App\Http\Controllers\ImageApiController@getThumbnailDetails');
