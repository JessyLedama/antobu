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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('search', function () {
    // return view('welcome');
})->name('search');

Route::get('product/{slug}', [PagesController::class, 'showProduct'])->name('product.show');

Route::get('add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('cart', [CartController::class, 'cart'])->name('cart');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::view('profile', 'profile')->name('profile');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // PRODUCTS
    Route::prefix('products')->group(function(){

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');

        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        
        Route::get('edit', [ProductController::class, 'edit'])->name('admin.product.edit');

        Route::post('update', [ProductController::class, 'update'])->name('admin.product.update');

        Route::get('xlsx', [ProductController::class, 'xlsx'])->name('admin.product.export');

        Route::get('csv', [ProductController::class, 'csv'])->name('admin.product.export');
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
    });
});

require __DIR__.'/auth.php';