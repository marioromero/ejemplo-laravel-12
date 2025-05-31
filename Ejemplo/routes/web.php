<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rutas de categorías, obtener, guardar y eliminar
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//rutas de productos, obtener, guardar y eliminar
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


