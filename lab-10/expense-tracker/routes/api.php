<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonthlyExpensesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExpensesController;

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


// Define the API routes for the UserController
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/create', [UserController::class, 'store']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::delete('delete/{id}', [UserController::class, 'delete']);
});

// Define the API routes for the MonthlyExpensesController
Route::group(['prefix' => 'monthly-expenses'], function () {
    Route::get('/{id}', [MonthlyExpensesController::class, 'show']);
    Route::post('/create', [MonthlyExpensesController::class, 'store']);
    Route::post('/update/{id}', [MonthlyExpensesController::class, 'update']);
    Route::delete('delete/{id}', [MonthlyExpensesController::class, 'delete']);

    // Add a new route to get all monthly expenses for a specific user
    Route::get('/user/{id}', [MonthlyExpensesController::class, 'getMonthlyExpensesByUser']);
});

// Define the API routes for the CategoriesController
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index']);
    Route::get('/{id}', [CategoriesController::class, 'show']);
    Route::post('/create', [CategoriesController::class, 'store']);
    Route::post('/update/{id}', [CategoriesController::class, 'update']);
    Route::delete('delete/{id}', [CategoriesController::class, 'delete']);
});

// Define the API routes for the ExpensesController
Route::group(['prefix' => 'expenses'], function () {
    Route::get('/{id}', [ExpensesController::class, 'show']);
    Route::post('/create', [ExpensesController::class, 'store']);
    Route::post('/update/{id}', [ExpensesController::class, 'update']);
    Route::delete('delete/{id}', [ExpensesController::class, 'delete']);

    // Add a new route to get all expenses for a specific user
    Route::get('/user/{id}', [ExpensesController::class, 'getExpensesByUser']);
});