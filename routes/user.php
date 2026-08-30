<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function () {

    Route::get('/orders', [UserController::class, 'panelOrders'])->name('user.orders');
    Route::get('/transactions', [UserController::class, 'panelTransactions'])->name('user.transactions');
    Route::get('/courses', [UserController::class, 'panelCourses'])->name('user.courses');

    Route::get('/profile/view', [UserController::class, 'panelProfile'])->name('user.profile.view');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    Route::get('dashboard', [UserController::class, 'panel'])->name('user.panel');

});
