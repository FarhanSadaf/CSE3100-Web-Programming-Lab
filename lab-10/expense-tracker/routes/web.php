<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'expense.index')->name('expense.index');