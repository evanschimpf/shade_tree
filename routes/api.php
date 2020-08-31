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
Route::get('cars', 'ControllerCars@getAllCars');
Route::get('cars/{id}', 'ControllerCars@getCar');
Route::post('cars', 'ControllerCars@createCar');
Route::put('cars/{id}', 'ControllerCars@updateCar');
Route::delete('cars/{id}', 'ControllerCars@deleteCar');

/********** Images **********/
Route::get('images/{id}', 'ControllerImages@getImage');
Route::post('images', 'ControllerImages@createImage');
Route::put('images/{id}', 'ControllerImages@updateImage');
Route::delete('images/{id}', 'ControllerImages@deleteImage');




