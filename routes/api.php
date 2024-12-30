<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/product-get', [ProductController::class,'getProduct']);
Route::get('/product-get-collection', [ProductController::class,'getProductCollection']);
Route::get('/product-get-single/{id}', [ProductController::class,'getProductSingle']);
Route::post('/product-create', [ProductController::class,'createProduct']);
