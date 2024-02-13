<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\WeatherController;


Route::get('/', function () {
    return view('weather');
});

/*
// Gettting the coordinates
Route::get('/coordinates/', [PositionController::class, 'getCurrentCoordinates']);
Route::get('/coordinates/{city}', [PositionController::class, 'getCoordinatesByCity']);
*/

// Or use Route Group, adding the throttle middleware to limit the number of requests maximum 10 per minute
Route::prefix('coordinates')->group(function () {
    Route::get('/', [PositionController::class, 'getCurrentCoordinates'])->middleware('throttle:10,1');
    Route::get('/{city}', [PositionController::class, 'getCoordinatesByCity'])->middleware('throttle:10,1');
});

// Getting the weather, 
// adding the throttle middleware to limit the number of requests maximum 10 per minute,
// and the country middleware to check the country of the coordinates and allow only Bangladesh
Route::get('/weather/{lat}/{lon}', [WeatherController::class, 'getWeatherByCoordinates'])->middleware(['throttle:10,1', 'country:BD']);