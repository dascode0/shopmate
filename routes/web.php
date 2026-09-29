<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class, 'registerSubmit'])->name('register');

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class, 'loginSubmit'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/products', function () {
    return view('product.index');
})->middleware('auth')->name('products.index');

Route::get('/dashboard/categories', function () {
    return view('category.index');
})->middleware('auth')->name('categories.index');

Route::get('/dashboard/orders', function () {
    return view('order.index');
})->middleware('auth')->name('orders.index');