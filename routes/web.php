<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

    


//frontend
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
Route::get('/shop', [HomeController::class, 'shop'])->name('frontend.shop');
Route::get('/view/product/{slug}', [FrontendProductController::class, 'viewProduct'])->name('frontend.view.product');

//Shopping Cart
Route::get('/view/cart/item', [ShoppingCartController::class, 'viewCart'])->name('frontend.view.cart.item');
Route::get('/add/to/cart/{id}', [ShoppingCartController::class, 'addToCart'])->name('frontend.addToCart');
Route::get('/remove/cart/{id}', [ShoppingCartController::class, 'removeCart'])->name('frontend.removeCart');

//Registration
Route::get('/customer/registration', [CustomerController::class, 'customerRegistration'])->name('frontend.customer.registration');
Route::post('/customer/registration/store', [CustomerController::class, 'customerRegistrationStore'])->name('frontend.customer.registration.store');
Route::get('/view/profile',[CustomerController::class, 'viewProfile'])->name('frontend.view.profile');
Route::get('/edit/profile',[CustomerController::class, 'editProfile'])->name('frontend.edit.profile');
Route::post('/submit/profile',[CustomerController::class, 'submitProfile'])->name('frontend.submit.profile');



Route::get('/send/email', [MailController::class, 'sendMail'])->name('frontend.send.email');
Route::post('/verify/otp', [MailController::class,'checkOtp'])->name('frontend.check.otp');




//Login
Route::get('/customer/login', [CustomerController::class, 'customerLogin'])->name('frontend.customer.login');
Route::post('/customer/do/login', [CustomerController::class, 'doLogin'])->name('frontend.do.login');

    Route::group(['middleware' => 'customer_auth'], function () {
        //Checkout
        Route::get('/proceed/to/checkout', [OrderController::class, 'proceedToCheckout'])->name('frontend.proceed.checkout');
        Route::post('/continue/to/checkout', [OrderController::class, 'continueToCheckout'])->name('frontend.continue.checkout');
        //Logout
        Route::get('/customer/logout', [CustomerController::class, 'customerLogout'])->name('frontend.logout');
    });






//backend
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthenticationController::class, 'loginForm'])->name('login');
    Route::post('/do/login', [AuthenticationController::class, 'doLogin'])->name('do.login');

    Route::group(['middleware' => ['auth', 'check_permission']], function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
        Route::get('/logout', [AuthenticationController::class, 'logout'])->name('backend.logout');

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/list', [BannerController::class, 'bannerList'])->name('backend.banner.list');
            Route::get('/form', [BannerController::class, 'bannerForm'])->name('backend.banner.form');
            Route::post('/store', [BannerController::class, 'bannerStore'])->name('backend.banner.store');
            Route::get('/edit/{id}', [BannerController::class, 'bannerEdit'])->name('backend.banner.edit');
            Route::post('/update/{id}', [BannerController::class, 'bannerUpdate'])->name('backend.banner.update');
            Route::get('/delete/{id}', [BannerController::class, 'bannerDelete'])->name('backend.banner.delete');
            Route::get('/import/excel/form', [BannerController::class, 'bannerImportExcelForm'])->name('backend.banner.import.excel.form');
            Route::post('/import/excel/store', [BannerController::class, 'bannerImportExcelStore'])->name('backend.banner.import.excel.store');
            Route::get('/ajax/banner/data',[BannerController::class,'getBannerData'])->name('ajax.banner.data');

        });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/list', [CustomerController::class, 'customerList'])->name('backend.customer.list');
            Route::get('/form', [CustomerController::class, 'customerForm'])->name('backend.customer.form');
            Route::post('/store', [CustomerController::class, 'customerStore'])->name('backend.customer.store');
            Route::get('/edit/{id}', [CustomerController::class, 'customerEdit'])->name('backend.customer.edit');
            Route::post('/update/{id}', [CustomerController::class, 'customerUpdate'])->name('backend.customer.update');
            Route::get('/delete/{id}', [CustomerController::class, 'customerDelete'])->name('backend.customer.delete');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [CategoryController::class, 'categoryList'])->name('backend.category.list');
            Route::get('/form', [CategoryController::class, 'categoryForm'])->name('backend.category.form');
            Route::post('/store', [CategoryController::class, 'categoryStore'])->name('backend.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('backend.category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('backend.category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('backend.category.delete');
            Route::get('/ajax/category/data',[CategoryController::class,'getCategoryData'])->name('ajax.category.data');

        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('/list', [BrandController::class, 'brandList'])->name('backend.brand.list');
            Route::get('/form', [BrandController::class, 'brandForm'])->name('backend.brand.form');
            Route::post('/store', [BrandController::class, 'brandStore'])->name('backend.brand.store');
            Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('backend.brand.edit');
            Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('backend.brand.update');
            Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('backend.brand.delete');
            Route::get('/ajax/brand/data',[BrandController::class,'getBrandData'])->name('ajax.brand.data');

        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/list', [ProductController::class, 'productList'])->name('backend.product.list');
            Route::get('/form', [ProductController::class, 'productForm'])->name('backend.product.form');
            Route::post('/store', [ProductController::class, 'productStore'])->name('backend.product.store');
            Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('backend.product.edit');
            Route::post('/update/{id}', [ProductController::class, 'productUpdate'])->name('backend.product.update');
            Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('backend.product.delete');
            Route::get('/ajax/product/data',[ProductController::class,'getProductData'])->name('ajax.product.data');
        });

        Route::group(['prefix' => 'settings'], function () {

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
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/list', [RoleController::class, 'roleList'])->name('backend.role.list');
            Route::get('/form', [RoleController::class, 'roleForm'])->name('backend.role.form');
            Route::post('/store', [RoleController::class, 'roleStore'])->name('backend.role.store');
            Route::get('/permission/{id}', [RoleController::class, 'rolePermission'])->name('backend.role.permission');
            Route::post('/submit/permission/{id}', [RoleController::class, 'submitPermission'])->name('backend.submit.permission');
            Route::get('/edit/{id}', [RoleController::class, 'roleEdit'])->name('backend.role.edit');
            Route::post('/update/{id}', [RoleController::class, 'roleUpdate'])->name('backend.role.update');
            Route::get('/delete/{id}', [RoleController::class, 'roleDelete'])->name('backend.role.delete');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/list', [AuthenticationController::class, 'userList'])->name('backend.user.list');
            Route::get('/form', [AuthenticationController::class, 'userForm'])->name('backend.user.form');
            Route::post('/store', [AuthenticationController::class, 'userStore'])->name('backend.user.store');
            Route::get('/edit/{id}', [AuthenticationController::class, 'userEdit'])->name('backend.user.edit');
            Route::post('/update/{id}', [AuthenticationController::class, 'userUpdate'])->name('backend.user.update');
            Route::get('/delete/{id}', [AuthenticationController::class, 'userDelete'])->name('backend.user.delete');
        });
    });
});
