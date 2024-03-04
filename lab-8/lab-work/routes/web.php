<?php

use Illuminate\Support\Facades\Route;

// Must use the BankAccountController class
use App\Http\Controllers\BankAccountController;

/* Solving the lab test problem */
// For using the DepositMiddleware and WithdrawMiddleware
use App\Http\Middleware\DepositMiddleware;
use App\Http\Middleware\WithdrawMiddleware;

Route::get('/bank-account', [BankAccountController::class, 'show'])->name('bank-account');
Route::post('/bank-account', [BankAccountController::class, 'update'])->name('bank-account')->middleware([DepositMiddleware::class, WithdrawMiddleware::class]);
