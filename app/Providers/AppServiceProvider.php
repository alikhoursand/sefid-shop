<?php

namespace App\Providers;

use App\Classes\Shop\CartHelper;
use App\Classes\Shop\CategoryHelper;
use App\Classes\SiteHelper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer([
            'user.home',
        ], function ($view) {

            $settings = SiteHelper::getAllSetting(false,true);

            $view->with('settings', $settings);
        });

        View::composer([
            'components.main.footer',
        ], function ($view) {

            $settings = SiteHelper::getAllSetting(false,false);

            $view->with('settings', $settings);
        });


        View::composer([
            'components.main.navbar'
        ], function ($view) {

            $cart_class = new CartHelper();
            $cart = $cart_class->getCart();

            $view->with('cart', $cart);
        });
    }
}
