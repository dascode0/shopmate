<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\SetTenantDatabase;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'registerSubmit'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', SetTenantDatabase::class])->group(function () {
    Route::get('/dashboard/products', [ProductController::class, 'index'])
        ->name('products.index');
    Route::post('/dashboard/products', [ProductController::class, 'store'])
        ->name('products.store');
    Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])
        ->name('categories.store');
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');
});

Route::get('/dashboard/orders', function () {
    return view('order.index');
})->middleware('auth')->name('orders.index');
