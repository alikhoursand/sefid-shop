<?php

use App\Http\Controllers\Shop\DiscountController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\EnsureCartAccessAuthenticated;
use Illuminate\Support\Facades\Route;


Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->middleware(EnsureCartAccessAuthenticated::class)->name('shop.cart.index');

    Route::post('store/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::delete('remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
});


Route::prefix('order')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('details', [OrderController::class, 'details'])->name('shop.order.details');
        Route::post('create-order', [OrderController::class, 'createOrder'])->name('shop.order.create');
        Route::get('payment', [OrderController::class, 'payment'])->name('shop.order.payment');
        Route::post('pay', [OrderController::class, 'payOrder'])->name('shop.order.pay');
        Route::post('discount', [OrderController::class, 'applyDiscount'])->name('shop.order.discount');
    });
    Route::POST('callback', [OrderController::class, 'callback'])->name('shop.order.callback');
});


Route::prefix('shop')->group(function () {

    Route::get('/view/{product:slug}', [ShopController::class, 'view'])->name('shop.product.view');
    Route::get('/category/{category}', [ShopController::class, 'index'])->name('shop.category.view');
    Route::get('/offers', [ShopController::class, 'offers'])->name('shop.offers');
    Route::get('/products', [ShopController::class, 'products'])->name('shop.product.list');
    Route::get('/categories', [ShopController::class, 'categories'])->name('shop.category.list');

});
