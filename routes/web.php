<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

//admin prefix add

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthenticationController::class, 'loginForm'])->name('login');
    Route::post('/do/login', [AuthenticationController::class, 'doLogin'])->name('do.login');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
            Route::get('/logout', [AuthenticationController::class, 'logout'])->name('backend.logout');

                    Route::group(['prefix' => 'category'], function () {
                        Route::get('/list', [CategoryController::class, 'categoryList'])->name('backend.category.list');
                        Route::get('/form', [CategoryController::class, 'categoryForm'])->name('backend.category.form');
                        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('backend.category.store');
                        Route::get('/edit/{catID}', [CategoryController::class, 'categoryEdit'])->name('backend.category.edit');
                        Route::post('/update/{catID}', [CategoryController::class, 'categoryUpdate'])->name('backend.category.update');
                        Route::get('/delete/{catID}', [CategoryController::class, 'categoryDelete'])->name('backend.category.delete');
                    });

                    Route::group(['prefix' => 'product'], function () {
                        Route::get('/list', [ProductController::class, 'productList'])->name('backend.product.list');
                        Route::get('/form', [ProductController::class, 'productForm'])->name('backend.product.form');
                        Route::post('/store', [ProductController::class, 'productStore'])->name('backend.product.store');
                        Route::get('/edit/{catID}', [ProductController::class, 'productEdit'])->name('backend.product.edit');
                        Route::post('/update/{catID}', [ProductController::class, 'productUpdate'])->name('backend.product.update');
                        Route::get('/delete/{catID}', [ProductController::class, 'productDelete'])->name('backend.product.delete');
                    });

                Route::group(['prefix' => 'settings'], function () {
                    Route::group(['prefix' => 'seo'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{catID}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{catID}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{catID}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                    Route::group(['prefix' => 'website'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{catID}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{catID}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{catID}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                    Route::group(['prefix' => 'page'], function () {
                        Route::get('/list', [PageController::class, 'pageList'])->name('backend.page.list');
                        Route::get('/form', [PageController::class, 'pageForm'])->name('backend.page.form');
                        Route::post('/store', [PageController::class, 'pageStore'])->name('backend.page.store');
                        Route::get('/edit/{pageID}', [PageController::class, 'pageEdit'])->name('backend.page.edit');
                        Route::post('/update/{pageID}', [PageController::class, 'pageUpdate'])->name('backend.page.update');
                        Route::get('/delete/{pageID}', [PageController::class, 'pageDelete'])->name('backend.page.delete');
                    });
                    Route::group(['prefix' => 'smtp'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{catID}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{catID}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{catID}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                    Route::group(['prefix' => 'paymentgateway'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{catID}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{catID}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{catID}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                });
        });
});
