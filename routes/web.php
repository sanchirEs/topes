<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('blog/{id}', [HomeController::class, 'blog'])->name('blogdetail');
Route::get('shop', [HomeController::class, 'shop'])->name('shopdetail');