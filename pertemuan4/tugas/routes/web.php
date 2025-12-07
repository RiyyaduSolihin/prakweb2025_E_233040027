
<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });

    Route::resource('/dashboard/categories', CategoryController::class);
    Route::resource('/dashboard/posts', DashboardPostController::class);
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardPostController::class, 'index'])->name('dashboard');
});

// Route untuk dashboard posts - hanya untuk yang sudah login
// Index : Menampilkan semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

// Create : Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');

// Store : Menyimpan post baru
Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');

// Show : Menampilkan detail post berdasarkan slug
Route::get('/dashboard/posts/{slug}', [DashboardPostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');



// Route logout – hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





