<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//backend work

Route::get('/',[DashboardController::class, 'dashboard'])->name('backend.dashboard');

Route::get('/category/list', [CategoryController::class, 'categoryList'])->name('backend.category.list');

Route::post('/category/store',[CategoryController::class, 'categoryStore'])->name('backend.category.store');

Route::get('/delete/category/{catID}', [CategoryController::class, 'deleteCategory'])->name('backend.delete.category');