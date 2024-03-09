<?php

use Illuminate\Support\Facades\Route;

/* Task 1 */
use App\Http\Controllers\BasicFormController;

/* Task 2 */
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\HomeController;

use App\Http\Middleware\DepositMiddleware;
use App\Http\Middleware\WithdrawMiddleware;
use App\Http\Middleware\SimpleResponseMiddleware;


/* Task 1: Basic GET, POST route with form validation */
Route::group(['prefix' => '/task1'], function () {
    Route::get('/form1', function () {
        return view('task1.form1');
    });
    // Or you can directly use Route::view
    Route::view('form2', 'task1.form2');

    Route::get('/form/submitted', [BasicFormController::class, 'formSubmitted'])->name('form.submitted');
    Route::post('/form/submitted', [BasicFormController::class, 'formSubmitted'])->name('form.submitted');
});

/* Task 2: Solving the lab test problem with middlewares */
Route::get('/task2', [HomeController::class, 'index'])->name('home');

// Using middleware group
Route::group(['prefix' => '/task2', 'middleware' => 'simple-auth'], function () {
    Route::get('/bank-account', [BankAccountController::class, 'show'])->name('bank-account')->middleware([SimpleResponseMiddleware::class]);
    Route::post('/bank-account', [BankAccountController::class, 'update'])->name('bank-account')->middleware([DepositMiddleware::class, WithdrawMiddleware::class, SimpleResponseMiddleware::class]);

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});
