<?php

use Illuminate\Support\Facades\Route;

Route::view('/expenses', 'expense.index')->name('expense.index');