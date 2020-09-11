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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/********** Cars **********/
Route::get('cars', 'ApiControllerCars@getAllCars');
Route::get('cars/{id}', 'ApiControllerCars@getCar');
Route::post('cars', 'ApiControllerCars@createCar');
Route::put('cars/{id}', 'ApiControllerCars@updateCar');
Route::delete('cars/{id}', 'ApiControllerCars@deleteCar');

/********** Images **********/
Route::get('images/{id}', 'ApiControllerImages@getImage');
Route::get('images/{id}/details', 'ApiControllerImages@getImageDetails');
Route::post('images', 'ApiControllerImages@createImage');
Route::put('images/{id}', 'ApiControllerImages@updateImage');
Route::delete('images/{id}', 'ApiControllerImages@deleteImage');

/********** Images Thumbnails **********/
Route::get('image_thumbnails/{id}', 'ApiControllerImages@getImageThumbnail');
Route::get('image_thumbnails/{id}/details', 'ApiControllerImages@getImageThumbnailDetails');




