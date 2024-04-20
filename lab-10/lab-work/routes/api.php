<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoResponseController;
use App\Http\Controllers\DemoRequestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "req"], function() {
    Route::get("/demo1", [DemoRequestController::class, "demo1"]);
    Route::get("/demo2", [DemoRequestController::class, "demo2"]);
    Route::get("/demo3", [DemoRequestController::class, "demo3"]);
    Route::get("/demo4", [DemoRequestController::class, "demo4"]);
    Route::get("/demo5", [DemoRequestController::class, "demo5"]);
    Route::get("/demo6", [DemoRequestController::class, "demo6"]);
    Route::get("/demo7", [DemoRequestController::class, "demo7"]);
    Route::get("/demo8", [DemoRequestController::class, "demo8"]);
});

Route::group(["prefix" => "res"], function() {
    Route::get("/demo1", [DemoResponseController::class, "demo1"]);
    Route::get("/demo2", [DemoResponseController::class, "demo2"]);
    Route::get("/demo3", [DemoResponseController::class, "demo3"]);
    Route::get("/demo4", [DemoResponseController::class, "demo4"]);
    Route::get("/demo5", [DemoResponseController::class, "demo5"]);
    Route::get("/demo6", [DemoResponseController::class, "demo6"]);
    Route::get("/demo7", [DemoResponseController::class, "demo7"]);
    Route::get("/demo8", [DemoResponseController::class, "demo8"]);
    Route::get("/demo9", [DemoResponseController::class, "demo9"]);
});
