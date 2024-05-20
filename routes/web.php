<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;

Route::get('/', [PagesController::class, 'home']);

Route::get('search', function () {
    // return view('welcome');
})->name('search');

Route::get('product', function () {
    return view('product');
})->name('product.show');

Route::middleware(['auth'])->group(function(){

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
});

require __DIR__.'/auth.php';