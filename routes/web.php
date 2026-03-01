<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


//головна сторінка
Route::get('/', [ProductController::class, 'index']);

//параметризований запит (завдання 1.2)
Route::get('/products/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');

Route::get('/category/{id}', [ProductController::class, 'category'])->where('id', '[0-9]+');

//POST запит (завдання 1.3)
Route::post('/', [ProductController::class, 'store']);
