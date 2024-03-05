<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

// Adding a named route
Route::get('/', [WeatherController::class, 'getWeather'])->name('weather');
Route::post('/', [WeatherController::class, 'getWeather'])->name('weather');

// Get the weather of Bangladesh only
Route::group(['prefix' => 'bd'], function () {
    Route::get('/', [WeatherController::class, 'getWeather'])->name('weather');
    Route::post('/', [WeatherController::class, 'getWeather'])->name('weather')->middleware('country:BD');
});

