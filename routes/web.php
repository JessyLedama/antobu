<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('search', function () {
    // return view('welcome');
})->name('search');

Route::get('product', function () {
    return view('product');
})->name('product.show');
