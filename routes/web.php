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
use App\Http\Controllers\RoleController;

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

    Route::prefix('admin')->group(function(){
    
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CREATE GROUP
        Route::middleware('permission:create-model')->group(function(){
            
            // PRODUCTS
            Route::prefix('products')->group(function(){
                Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
            
                Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
            });

            // PRODUCT CATEGORIES
            Route::prefix('product-categories')->group(function(){
                
                Route::get('create', [ProductCategoryController::class, 'create'])->name('admin.productCategory.create');
                
                Route::post('store', [ProductCategoryController::class, 'store'])->name('admin.productCategory.store');
            });

             // SLIDES
            Route::prefix('slides')->group(function(){
                
                Route::get('create', [SlideshowController::class, 'create'])->name('admin.slide.create');
        
                Route::post('store', [SlideshowController::class, 'store'])->name('admin.slide.store');
            });

            // NEWSLETTERS
            Route::prefix('newsletters')->group(function(){

                Route::get('create', [NewsletterController::class, 'create'])->name('admin.newsletter.create');
        
                Route::post('store', [NewsletterController::class, 'store'])->name('admin.newsletter.store');
            });

            // Company Details
            Route::prefix('settings/company')->group(function(){
                
                Route::get('create', [CompanyDetailController::class, 'create'])->name('admin.company.create');
                
                Route::post('store', [CompanyDetailController::class, 'store'])->name('admin.company.store');
            });

            // STATUS
            Route::prefix('status')->group(function(){
                                
                Route::get('create', [StatusController::class, 'create'])->name('admin.status.create');
                
                Route::post('store', [StatusController::class, 'store'])->name('admin.status.store');
            });

            // THEME
            Route::prefix('theme')->group(function(){
                
                Route::get('create', [ThemeController::class, 'create'])->name('admin.theme.create');
    
                Route::post('store', [ThemeController::class, 'store'])->name('admin.theme.store');

                Route::get('activate/{slug}', [ThemeController::class, 'activate'])->name('admin.theme.activate');
            });

            // ROLES
            Route::prefix('roles')->group(function(){
                
                Route::get('create', [RoleController::class, 'create'])->name('admin.role.create');
    
                Route::post('store', [RoleController::class, 'store'])->name('admin.role.store');
    
                Route::get('activate/{slug}', [RoleController::class, 'activate'])->name('admin.role.activate');
            });
        });

        // EDIT GROUP
        Route::middleware('permission:edit-model')->group(function(){

            // PRODUCTS
            Route::prefix('products')->group(function(){
                Route::get('edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    
                Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        
                Route::post('update-more-images/{id}', [ProductController::class, 'updateMoreImages'])->name('admin.product.updateMoreImages');
        
                Route::post('update-description/{id}', [ProductController::class, 'updateDescription'])->name('admin.product.updateDescription');
        
                Route::post('update-color/{id}', [ProductController::class, 'updateColor'])->name('admin.product.updateColor');
        
                Route::post('update-material/{id}', [ProductController::class, 'updateMaterial'])->name('admin.product.updateMaterial');
            });

            // PRODUCT CATEGORIES
            Route::prefix('product-categories')->group(function(){
                                
                Route::get('edit', [ProductCategoryController::class, 'edit'])->name('admin.productCategory.edit');
        
                Route::post('update', [ProductCategoryController::class, 'update'])->name('admin.productCategory.update');
            });

            // SLIDES
            Route::prefix('slides')->group(function(){
        
                Route::get('edit/{slug}', [SlideshowController::class, 'edit'])->name('admin.slide.edit');

                Route::post('update/{slug}', [SlideshowController::class, 'update'])->name('admin.slide.update');
            });

            // Company Details
            Route::prefix('settings/company')->group(function(){
                
                Route::get('edit/{slug}', [CompanyDetailController::class, 'edit'])->name('admin.company.edit');
                
                Route::post('update/{slug}', [CompanyDetailController::class, 'update'])->name('admin.company.update');
            });

            // STATUS
            Route::prefix('status')->group(function(){
                
                Route::get('edit', [StatusController::class, 'edit'])->name('admin.status.edit');
                
                Route::post('update', [StatusController::class, 'update'])->name('admin.status.update');
            });

            // THEME
            Route::prefix('theme')->group(function(){
            
                Route::get('edit/{slug}', [ThemeController::class, 'edit'])->name('admin.theme.edit');
    
                Route::post('update/{slug}', [ThemeController::class, 'update'])->name('admin.theme.update');
            });

            // ROLES
            Route::prefix('roles')->group(function(){
                
                Route::get('edit/{slug}', [RoleController::class, 'edit'])->name('admin.role.edit');
    
                Route::post('update/{slug}', [RoleController::class, 'update'])->name('admin.role.update');
            });
        });

        // DELETE GROUP
        Route::middleware('permission:delete-model')->group(function(){
            Route::post('/delete', [ProductController::class, 'destroy'])->name('delete.product');
        });

        // VIEW GROUP
        Route::middleware('permission:view-model')->group(function(){
            
            Route::get('product-categories', [ProductCategoryController::class, 'index'])->name('admin.productCategory.index');

            Route::get('products', [ProductController::class, 'index'])->name('product.index');

            Route::get('orders', [OrderController::class, 'index'])->name('admin.order.index');

            Route::get('slideshows', [SlideshowController::class, 'index'])->name('admin.slide.index');

            Route::get('slideshows/{slug}', [SlideshowController::class, 'show'])->name('admin.slide.show');

            Route::get('newsletters', [NewsletterController::class, 'index'])->name('admin.newsletter.index');

            Route::get('settings', [SettingsController::class, 'index'])->name('admin.settings');

            Route::get('settings/companies', [CompanyDetailController::class, 'index'])->name('admin.company.index');
            
            Route::get('settings/companies/{slug}', [CompanyDetailController::class, 'show'])->name('admin.company.show');

            Route::get('settings/statuses', [StatusController::class, 'index'])->name('admin.status.index');

            Route::get('settings/themes', [ThemeController::class, 'index'])->name('admin.theme.index');

            Route::get('settings/themes/{slug}', [ThemeController::class, 'show'])->name('admin.theme.show');

            Route::get('settings/roles', [RoleController::class, 'index'])->name('admin.role.index');

            Route::get('settings/roles/{slug}', [RoleController::class, 'show'])->name('admin.role.show');

            Route::get('settings/users', [UserController::class, 'index'])->name('admin.user.index');

            Route::get('settings/users/{slug}', [UserController::class, 'show'])->name('admin.user.show');

        });

        // EXPORT GROUP
        Route::middleware('permission:export-model')->group(function(){
            Route::get('products/xlsx', [ProductController::class, 'xlsx'])->name('admin.product.xlsx');
    
            Route::get('products/csv', [ProductController::class, 'csv'])->name('admin.product.csv');

            Route::get('companies/xlsx', [CompanyDetailController::class, 'xlsx'])->name('admin.company.xlsx');
    
            Route::get('companies/csv', [CompanyDetailController::class, 'csv'])->name('admin.company.csv');
        });
    });
});

Route::view('test', 'test');

require __DIR__.'/auth.php';