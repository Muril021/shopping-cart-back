<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/categories')
->group(function () {
  Route::get('', [
    CategoryController::class,
    'index'
  ]);

  Route::post('/create', [
    CategoryController::class,
    'store'
  ]);

  Route::put('/update/{id}', [
    CategoryController::class,
    'update'
  ]);

  Route::delete('/{id}', [
    CategoryController::class,
    'destroy'
  ]);
});

Route::prefix('/products')
->group(function () {
  Route::get('', [
    ProductController::class,
    'index'
  ]);

  Route::post('/create', [
    ProductController::class,
    'store'
  ]);
});
