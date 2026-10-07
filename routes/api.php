<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/{shop_key}/categories', [CategoryController::class, 'get_categories'])->name('api.categories.show');
Route::get('/{shop_key}/category/{category_id}', [CategoryController::class, 'get_category'])->name('api.category.show');

Route::get('/{shop_key}/products', [ProductController::class, 'get_products'])->name('api.products.show');
Route::get('/{shop_key}/product/{product_id}', [ProductController::class, 'get_product'])->name('api.product.show');