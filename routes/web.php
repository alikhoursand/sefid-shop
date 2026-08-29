<?php

use App\Classes\SiteHelper;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::middleware('api')->group(function () {
    Route::get('api/get-cities', function (Request $request) {
        return response()->json(SiteHelper::getCities($request->state_id));
    });
});

Route::get('/test', function () {
    return false;
    $categories = \App\Models\Shop\Categories::inRandomOrder()->take(5)->get();
//
    foreach ($categories as $cat) {
//        $id = $product->id;
//        $product->title = "محصول تستی شماره $id ";
        $cat->menu = 1;
        $cat->save();
    }

});
