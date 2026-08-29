<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\DiscountController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(Admin::class)->group(function () {

    Route::prefix('settings')->group(function () {
        Route::get('/list', [SettingsController::class, 'settings'])->name('admin.settings');
        Route::put('/setting/post/update', [SettingsController::class, 'settingsPostUpdate'])->name('admin.settings.post.update');
        Route::put('/setting/tax/update', [SettingsController::class, 'settingsTaxUpdate'])->name('admin.settings.tax.update');
        Route::put('/setting/info/update', [SettingsController::class, 'settingsInfoUpdate'])->name('admin.settings.info.update');
        Route::put('/setting/telegram/update', [SettingsController::class, 'settingsTelegramUpdate'])->name('admin.settings.telegram.update');

        Route::get('setting/variables/list', [SettingsController::class, 'variables'])->name('admin.settings.variables.list');
        Route::patch('setting/variables/update/{setting}', [SettingsController::class, 'updateVariable'])->name('admin.settings.variables.update');

    });

    Route::prefix('transactions')->group(function () {
        Route::get('/list', [AdminController::class, 'adminTransactions'])->name('admin.transactions');
        Route::get('/search', [AdminController::class, 'adminTransactionsSearch'])->name('admin.transactions.search');
    });

    Route::prefix('banners')->group(function () {
        Route::get('/list', [AdminController::class, 'banners'])->name('admin.banners');
        Route::post('/store', [AdminController::class, 'imageStore'])->name('admin.banner.store');
        Route::put('/change-status/{image}', [AdminController::class, 'imageStatus'])->name('admin.banner.change-status');
        Route::delete('/delete/{image}', [AdminController::class, 'imageDelete'])->name('admin.banner.delete');
    });

    Route::prefix('sliders')->group(function () {
        Route::get('/list', [AdminController::class, 'sliders'])->name('admin.sliders');
        Route::post('/store', [AdminController::class, 'imageStore'])->name('admin.slider.store');
        Route::put('/change-status/{image}', [AdminController::class, 'imageStatus'])->name('admin.slider.change-status');
        Route::delete('/delete/{image}', [AdminController::class, 'imageDelete'])->name('admin.slider.delete');
    });

    Route::get('dashboard', [AdminController::class, 'adminPanel'])->name('admin.panel');

    Route::prefix('messages')->group(function () {
        Route::get('/list', [MessageController::class, 'index'])->name('admin.message.list');
        Route::post('/store', [MessageController::class, 'store'])->name('admin.message.store');
        Route::delete('/delete/{message}', [MessageController::class, 'delete'])->name('admin.message.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/users-search', [UserController::class, 'usersSearch'])->name('admin.user.search');
        Route::get('/users-list', [UserController::class, 'usersList'])->name('admin.user.list');
        Route::get('/admins-search', [UserController::class, 'adminsSearch'])->name('admin.user.admin.search');
        Route::get('/admins-list', [UserController::class, 'adminsList'])->name('admin.user.admin.list');
        Route::put('/change-status/{user}', [UserController::class, 'changeStatus'])->name('admin.user.change-status');
        Route::put('/change-role/{user}', [UserController::class, 'changeRole'])->name('admin.user.change-role');
    });

    Route::prefix('shop')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/list', [CategoryController::class, 'index'])->name('admin.shop.category.index');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.shop.category.store');
            Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.shop.category.update');
            Route::put('/change-status/{category}', [CategoryController::class, 'changeStatus'])->name('admin.shop.category.change-status');
        });

        Route::prefix('product')->group(function () {
            Route::get('/list', [ProductController::class, 'index'])->name('admin.shop.product.index');
            Route::get('/search', [ProductController::class, 'search'])->name('admin.shop.product.search');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.shop.product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.shop.product.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.shop.product.edit');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.shop.product.update');

            Route::put('/change-status/{product}', [ProductController::class, 'changeStatus'])->name('admin.shop.product.change-status');
            Route::put('/change-most-sold/{product}', [ProductController::class, 'changeMostSold'])->name('admin.shop.product.mostsold');
            Route::put('/change-special/{product}', [ProductController::class, 'changeSpecial'])->name('admin.shop.product.special');
            Route::put('/change-qty/{product}', [ProductController::class, 'changeQty'])->name('admin.shop.product.qty');

        });

        Route::prefix('discount')->middleware(Admin::class)->group(function () {
            Route::get('index', [DiscountController::class, 'index'])->name('admin.shop.discount.index');
            Route::get('search', [DiscountController::class, 'search'])->name('admin.shop.discount.search');
            Route::get('create', [DiscountController::class, 'create'])->name('admin.shop.discount.create');
            Route::post('store', [DiscountController::class, 'store'])->name('admin.shop.discount.store');
            Route::get('edit/{discount}', [DiscountController::class, 'edit'])->name('admin.shop.discount.edit');
            Route::put('update/{discount}', [DiscountController::class, 'update'])->name('admin.shop.discount.update');
            Route::put('change-status/{discount}', [DiscountController::class, 'changeStatus'])->name('admin.shop.discount.change-status');
        });

        Route::get('order/list', [AdminController::class, 'adminOrders'])->middleware(Admin::class)->name('admin.order.list');
        Route::get('order/search', [AdminController::class, 'adminOrdersSearch'])->middleware(Admin::class)->name('admin.order.search');

    });
});
