<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;


//Dashboard Routes
Route::prefix('admin')->group(function(){
    Route::get('products', [ProductController::class , 'index']);
    Route::get('products/create', [ProductController::class , 'create'])->name('product_create');
    Route::post('products/store', [ProductController::class , 'store'])->name('product_store');
    Route::get('products/edit/{id}', [ProductController::class , 'edit'])->name('product_edit');
    Route::get('products/delete/{id}', [ProductController::class , 'destroy'])->name('product_delete');
    Route::patch('products/update/{id}', [ProductController::class , 'update'])->name('product_update');

    Route::get('categories', [CategoryController::class , 'index']);
    Route::get('categories/create', [CategoryController::class , 'create'])->name('category_create');
    Route::post('categories/store', [CategoryController::class , 'store'])->name('category_store');
    Route::get('categories/edit/{id}', [CategoryController::class , 'edit'])->name('category_edit');
    Route::get('categories/delete/{id}', [CategoryController::class , 'destroy'])->name('category_delete');
    Route::patch('categories/update/{id}', [CategoryController::class , 'update'])->name('category_update');
});


//Front End Routes
Route::get('/', [FrontController::class , 'index']);

Route::get('/welcome', function(){
    return view('welcome');
});


// Route::get('/', [FrontController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
