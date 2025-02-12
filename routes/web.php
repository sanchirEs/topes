<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

View::composer(['layouts.master'],function ($view) {
  $view->with('categories', \App\Models\Product_category::orderBy('sort_order','ASC')->get());
});


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('shop', [HomeController::class, 'shop'])->name('shopdetail');
Route::get('shopcategory/{id}', [HomeController::class, 'shopcategory'])->name('shopcategory');
Route::get('{categorylink}/product/{id}', [HomeController::class, 'product'])->name('product');
