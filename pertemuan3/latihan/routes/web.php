<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;


// Halaman statis
Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about')->name('about');
Route::view('/blog', 'blog')->name('blog');
Route::view('/contact', 'contact')->name('contact');

// POSTS (protected by auth)
Route::middleware('auth')->group(function () {
    
    Route::resource('/dashboard/posts', DashboardPostController::class);

    // index posts
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');

    // detail post by slug
    Route::get('/posts/{post:slug}', [PostController::class, 'show'])
        ->name('posts.show');

    // categories
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories');

    // users
    Route::get('/users', [UserController::class, 'index'])
        ->name('users');
});

// AUTH (guest only)
Route::middleware('guest')->group(function () {

    // register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// logout (auth only)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    // Route untuk dashboard posts - hanya untuk yang sudah login

// Index - Menampilkan semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');

// Create - Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.create');

// Store - Menyimpan post baru
Route::post('/dashboard', [DashboardPostController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.store');

// Show - Menampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.show');

Route::resource('/dashboard/posts', DashboardPostController::class);



