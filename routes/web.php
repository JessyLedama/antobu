<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\StatusController;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::post('search', [PagesController::class, 'search'])->name('search');

Route::get('product/{slug}', [PagesController::class, 'showProduct'])->name('product.show');

Route::get('add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('cart', [CartController::class, 'cart'])->name('cart');

Route::post('newsletter-subscribe', [NewsletterSubscriberController::class, 'store'])->name('newsletterSubscribe');

Route::get('newsletter/{slug}', [NewsletterController::class, 'show'])->name('newsletter.show');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::view('profile', 'profile')->name('profile');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::post('add-to-wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // PRODUCTS
    Route::prefix('products')->group(function(){

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');

        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        
        Route::get('edit', [ProductController::class, 'edit'])->name('admin.product.edit');

        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

        Route::post('update-more-images/{id}', [ProductController::class, 'updateMoreImages'])->name('admin.product.updateMoreImages');

        Route::post('update-description/{id}', [ProductController::class, 'updateDescription'])->name('admin.product.updateDescription');

        Route::post('update-color/{id}', [ProductController::class, 'updateColor'])->name('admin.product.updateColor');

        Route::post('update-material/{id}', [ProductController::class, 'updateMaterial'])->name('admin.product.updateMaterial');

        Route::get('xlsx', [ProductController::class, 'xlsx'])->name('admin.product.xlsx');

        Route::get('csv', [ProductController::class, 'csv'])->name('admin.product.csv');
    });

    // PRODUCT CATEGORIES
    Route::prefix('product-categories')->group(function(){
        Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.productCategory.index');
        
        Route::get('create', [ProductCategoryController::class, 'create'])->name('admin.productCategory.create');
        
        Route::post('store', [ProductCategoryController::class, 'store'])->name('admin.productCategory.store');
        
        Route::get('edit', [ProductCategoryController::class, 'edit'])->name('admin.productCategory.edit');

        Route::post('update', [ProductCategoryController::class, 'update'])->name('admin.productCategory.update');
    });

    // ORDERS
    Route::prefix('orders')->group(function(){

        Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
    });

    // SLIDES
    Route::prefix('slides')->group(function(){

        Route::get('/', [SlideshowController::class, 'index'])->name('admin.slide.index');

        Route::get('create', [SlideshowController::class, 'create'])->name('admin.slide.create');

        Route::post('store', [SlideshowController::class, 'store'])->name('admin.slide.store');

        Route::get('edit/{slug}', [SlideshowController::class, 'edit'])->name('admin.slide.edit');
    });

    // NEWSLETTERS
    Route::prefix('newsletters')->group(function(){

        Route::get('/', [NewsletterController::class, 'index'])->name('admin.newsletter.index');

        Route::get('create', [NewsletterController::class, 'create'])->name('admin.newsletter.create');

        Route::post('store', [NewsletterController::class, 'store'])->name('admin.newsletter.store');
    });

    // SETTINGS
    Route::prefix('settings')->group(function(){

        Route::get('/', [SettingsController::class, 'index'])->name('admin.settings');

        // Company Details
        Route::prefix('company')->group(function(){
            Route::get('', [CompanyDetailController::class, 'index'])->name('admin.company.index');
            
            Route::get('create', [CompanyDetailController::class, 'create'])->name('admin.company.create');
            
            Route::post('store', [CompanyDetailController::class, 'store'])->name('admin.company.store');
            
            Route::get('edit/{slug}', [CompanyDetailController::class, 'edit'])->name('admin.company.edit');
            
            Route::post('update/{slug}', [CompanyDetailController::class, 'update'])->name('admin.company.update');

            Route::get('{slug}', [CompanyDetailController::class, 'show'])->name('admin.company.show');

            Route::get('xlsx', [CompanyDetailController::class, 'xlsx'])->name('admin.company.xlsx');

            Route::get('csv', [CompanyDetailController::class, 'csv'])->name('admin.company.csv');
        });

        // STATUS
        Route::prefix('status')->group(function(){
            Route::get('', [StatusController::class, 'index'])->name('admin.status.index');
            
            Route::get('create', [StatusController::class, 'create'])->name('admin.status.create');
            
            Route::post('store', [StatusController::class, 'store'])->name('admin.status.store');
            
            Route::get('edit', [StatusController::class, 'edit'])->name('admin.status.edit');
            
            Route::post('update', [StatusController::class, 'update'])->name('admin.status.update');
        });

        // THEME
        Route::prefix('theme')->group(function(){
            Route::get('/', [ThemeController::class, 'index'])->name('admin.theme.index');

            Route::get('create', [ThemeController::class, 'create'])->name('admin.theme.create');

            Route::post('store', [ThemeController::class, 'store'])->name('admin.theme.store');

            Route::get('edit/{slug}', [ThemeController::class, 'edit'])->name('admin.theme.edit');

            Route::post('update/{slug}', [ThemeController::class, 'update'])->name('admin.theme.update');

            Route::get('show/{slug}', [ThemeController::class, 'show'])->name('admin.theme.show');

            Route::get('activate/{slug}', [ThemeController::class, 'activate'])->name('admin.theme.activate');
        });
    });
});

Route::view('test', 'test');

require __DIR__.'/auth.php';