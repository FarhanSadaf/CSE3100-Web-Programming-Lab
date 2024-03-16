<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControllerQB;
use App\Http\Controllers\PostControllerORM;

Route::group(['prefix' => '/qb/post'], function() {
    Route::get('/{userId}', [PostControllerQB::class, 'index'])->name('qb.post.index');

    Route::get('/{userId}/create', [PostControllerQB::class, 'create'])->name('qb.post.create');
    Route::post('/{userId}/create', [PostControllerQB::class, 'create'])->name('qb.post.create');

    Route::get('/{userId}/update/{postId}', [PostControllerQB::class, 'update'])->name('qb.post.update');
    Route::post('/{userId}/update/{postId}', [PostControllerQB::class, 'update'])->name('qb.post.update');

    Route::get('/{userId}/delete/{postId}', [PostControllerQB::class, 'delete'])->name('qb.post.delete');
});


Route::group(['prefix' => '/orm/post'], function() {
    Route::get('/{userId}', [PostControllerORM::class, 'index'])->name('orm.post.index');

    Route::get('/{userId}/create', [PostControllerORM::class, 'create'])->name('orm.post.create');
    Route::post('/{userId}/create', [PostControllerORM::class, 'create'])->name('orm.post.create');

    Route::get('/{userId}/update/{postId}', [PostControllerORM::class, 'update'])->name('orm.post.update');
    Route::post('/{userId}/update/{postId}', [PostControllerORM::class, 'update'])->name('orm.post.update');

    Route::get('/{userId}/delete/{postId}', [PostControllerORM::class, 'delete'])->name('orm.post.delete');
});
