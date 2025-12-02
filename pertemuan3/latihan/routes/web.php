<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//contoh route untuk menampilkan view
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
});

// Route untuk memanggil method di PostController
Route::get('posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);