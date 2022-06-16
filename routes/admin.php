<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group( function(){
	Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
	Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
	Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
	Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('materials', \App\Http\Controllers\Admin\MaterialController::class);
    Route::resource('manufacturers', \App\Http\Controllers\Admin\ManufacturerController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');

Route::middleware('auth:admin')->group( function(){
	Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
	Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
	Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('materials', \App\Http\Controllers\Admin\MaterialController::class);
    Route::resource('manufacturers', \App\Http\Controllers\Admin\ManufacturerController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});
