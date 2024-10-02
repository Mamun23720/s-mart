<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\WebsiteController;
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
                        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('backend.category.edit');
                        Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('backend.category.update');
                        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('backend.category.delete');
                    });

                    Route::group(['prefix' => 'brand'], function () {
                        Route::get('/list', [BrandController::class, 'brandList'])->name('backend.brand.list');
                        Route::get('/form', [BrandController::class, 'brandForm'])->name('backend.brand.form');
                        Route::post('/store', [BrandController::class, 'brandStore'])->name('backend.brand.store');
                        Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('backend.brand.edit');
                        Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('backend.brand.update');
                        Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('backend.brand.delete');
                    });

                    Route::group(['prefix' => 'product'], function () {
                        Route::get('/list', [ProductController::class, 'productList'])->name('backend.product.list');
                        Route::get('/form', [ProductController::class, 'productForm'])->name('backend.product.form');
                        Route::post('/store', [ProductController::class, 'productStore'])->name('backend.product.store');
                        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('backend.product.edit');
                        Route::post('/update/{id}', [ProductController::class, 'productUpdate'])->name('backend.product.update');
                        Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('backend.product.delete');
                    });

                Route::group(['prefix' => 'settings'], function () {
                    Route::group(['prefix' => 'seo'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{id}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{id}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{id}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                    Route::group(['prefix' => 'website'], function () {
                        Route::get('/list', [WebsiteController::class, 'websiteList'])->name('backend.website.list');
                        Route::get('/form', [WebsiteController::class, 'websiteForm'])->name('backend.website.form');
                        Route::post('/store', [WebsiteController::class, 'websiteStore'])->name('backend.website.store');
                        Route::get('/edit/{id}', [WebsiteController::class, 'websiteEdit'])->name('backend.website.edit');
                        Route::post('/update/{id}', [WebsiteController::class, 'websiteUpdate'])->name('backend.website.update');
                        Route::get('/delete/{id}', [WebsiteController::class, 'websiteDelete'])->name('backend.website.delete');
                    });
                    Route::group(['prefix' => 'page'], function () {
                        Route::get('/list', [PageController::class, 'pageList'])->name('backend.page.list');
                        Route::get('/form', [PageController::class, 'pageForm'])->name('backend.page.form');
                        Route::post('/store', [PageController::class, 'pageStore'])->name('backend.page.store');
                        Route::get('/edit/{id}', [PageController::class, 'pageEdit'])->name('backend.page.edit');
                        Route::post('/update/{id}', [PageController::class, 'pageUpdate'])->name('backend.page.update');
                        Route::get('/delete/{id}', [PageController::class, 'pageDelete'])->name('backend.page.delete');
                    });
                    Route::group(['prefix' => 'smtp'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{id}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{id}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{id}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                    Route::group(['prefix' => 'paymentgateway'], function () {
                        // Route::get('/list', [SettingController::class, 'categoryList'])->name('backend.category.list');
                        // Route::get('/form', [SettingController::class, 'categoryForm'])->name('backend.category.form');
                        // Route::post('/store', [SettingController::class, 'categoryStore'])->name('backend.category.store');
                        // Route::get('/edit/{id}', [SettingController::class, 'categoryEdit'])->name('backend.category.edit');
                        // Route::post('/update/{id}', [SettingController::class, 'categoryUpdate'])->name('backend.category.update');
                        // Route::get('/delete/{id}', [SettingController::class, 'categoryDelete'])->name('backend.category.delete');
                    });
                });
        });
});
