<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth', 'author'])->prefix('author')->name('author.')->group(function () {
    Route::resource('posts', AuthorPostController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('posts', AdminPostController::class);
});

Route::get('home', [HomeController::class, 'index'])->name('home');