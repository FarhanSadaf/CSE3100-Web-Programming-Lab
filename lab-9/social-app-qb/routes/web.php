<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::group(['prefix' => 'post'], function() {
    Route::get('/{userId}/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/{userId}/create', [PostController::class, 'create'])->name('post.create');

    Route::get('/{userId}', [PostController::class, 'index'])->name('post.index');

    Route::get('/{userId}/update/{postId}', [PostController::class, 'update'])->name('post.update');
    Route::post('/{userId}/update/{postId}', [PostController::class, 'update'])->name('post.update');

    Route::get('/{userId}/delete/{postId}', [PostController::class, 'delete'])->name('post.delete');
});
