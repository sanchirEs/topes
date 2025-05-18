<?php

use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductQuestionController;

Filament::routes(); // ← this boots all the /admin routes


View::composer(['layouts.master'],function ($view) {
  $view->with('categories', \App\Models\Product_category::orderBy('sort_order','ASC')->get());
});

// Route::middleware(['web'])->group(function () {
//   Filament::routes();
// });

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('aboutpage');
Route::get('/shop', [HomeController::class, 'shop'])->name('shopdetail');
Route::get('/shopcategory/{id}', [HomeController::class, 'shopcategory'])->name('shopcategory');
Route::get('/{categorylink}/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/contact', [HomeController::class, 'contact'])->name('contactpage');
// Route::post('/upload-file', [FileUploadController::class, 'upload']);
Route::post('/questions/store', [ProductQuestionController::class, 'store'])->name('questions.store');
Route::post('/questions/{id}/reply', [ProductQuestionController::class, 'reply'])->name('questions.reply');
Route::delete('/questions/{id}', [ProductQuestionController::class, 'destroy'])->name('questions.destroy');
Route::put('/questions/{id}/updateReply', [ProductQuestionController::class, 'updateReply'])->name('questions.updateReply');
Route::delete('/questions/{id}/destroyReply', [ProductQuestionController::class, 'destroy'])->name('questions.destroyReply');

