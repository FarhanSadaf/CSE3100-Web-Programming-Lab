<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

// Adding a named route
Route::get('/', [WeatherController::class, 'getWeather'])->name('weather');
