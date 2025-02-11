<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('shop', [HomeController::class, 'shop'])->name('shopdetail');
Route::get('product/{id}', [HomeController::class, 'product'])->name('product');
