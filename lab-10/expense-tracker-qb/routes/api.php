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
    // Route to get all users
    Route::get('/', [UserController::class, 'index']);
    // Route to get a single user
    Route::get('/{id}', [UserController::class, 'show']);
    // Route to create a new user
    Route::post('/create', [UserController::class, 'store']);
    // Route to update a user
    Route::post('/update/{id}', [UserController::class, 'update']);
    // Route to delete a user
    Route::delete('delete/{id}', [UserController::class, 'delete']);
});

// Define the API routes for the MonthlyExpensesController
Route::group(['prefix' => 'monthly-expenses'], function () {
    // Route to get all monthly expenses for a specific user
    Route::get('/user/{id}', [MonthlyExpensesController::class, 'getMonthlyExpensesByUser']);
    // Route to create a new monthly expense for a specific user
    Route::post('/user/{id}/create', [MonthlyExpensesController::class, 'createMonthlyExpenseOfUser']);
    // Route to update a monthly expense 
    Route::post('/update/{id}', [MonthlyExpensesController::class, 'updateMonthlyExpense']);
    // Route to delete a monthly expense
    Route::delete('/delete/{id}', [MonthlyExpensesController::class, 'deleteMonthlyExpense']);
});

// Define the API routes for the CategoriesController
Route::group(['prefix' => 'categories'], function () {
    // Route to get all categories for a specific month
    Route::get('/month/{id}', [CategoriesController::class, 'getCategoriesByMonth']);
    // Route to create a new category for a specific month
    Route::post('/month/{id}/create', [CategoriesController::class, 'createCategoryOfMonth']);
    // Route to update a category
    Route::post('/update/{id}', [CategoriesController::class, 'updateCategory']);
    // Route to delete a category
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory']);
});

// Define the API routes for the ExpensesController
Route::group(['prefix' => 'expenses'], function () {
    // Route to create a new expense for a specific category
    Route::post('/category/{id}/create', [ExpensesController::class, 'createExpenseOfCategory']);
    // Add a new route to get all expenses for a specific user
    Route::get('/user/{id}', [ExpensesController::class, 'getExpensesByUser']);
    // Add a new route to update an expense
    Route::post('/update/{id}', [ExpensesController::class, 'updateExpense']);
    // Add a new route to delete an expense
    Route::delete('/delete/{id}', [ExpensesController::class, 'deleteExpense']);
});