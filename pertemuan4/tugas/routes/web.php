
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/welcome', function () {
    return view('welcome');
});


// Route untuk memanggil method di PostController
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Protect posts dan categories dengan auth middleware
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route Model Binding dengan slug
Route::get('/posts/{slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// Route untuk register – middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Route untuk login – middleware guest
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Route logout – hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





