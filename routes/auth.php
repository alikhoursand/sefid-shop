<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('register', function () {
        return redirect()->route('login');
    })->name('register');

    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('check-code', [AuthController::class, 'checkCode'])->name('checkCode');
    Route::get('check-code', function () {
        return redirect()->route('login');
    });

});

Route::prefix('auth')->middleware('auth')->group(function () {
    Route::match(['get', 'post'], 'logout', function () {
        Auth::logout();

        return redirect()->route('home');
    })->name('logout');
});
