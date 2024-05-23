<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\CartController;

Route::get('/', [PagesController::class, 'home']);

Route::get('search', function () {
    // return view('welcome');
})->name('search');

Route::get('product/{slug}', [PagesController::class, 'showProduct'])->name('product.show');

Route::get('add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('cart', [CartController::class, 'cart'])->name('cart');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::view('profile', 'profile')->name('profile');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('products')->group(function(){

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
    });

    Route::prefix('orders')->group(function(){

        Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
    });

    Route::prefix('slides')->group(function(){

        Route::get('/', [SlideshowController::class, 'index'])->name('admin.slide.index');

        Route::get('create', [SlideshowController::class, 'create'])->name('admin.slide.create');

        Route::post('store', [SlideshowController::class, 'store'])->name('admin.slide.store');
    });
});

require __DIR__.'/auth.php';