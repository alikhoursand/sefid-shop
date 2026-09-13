<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Faq;
use App\Models\Shop\Category;
use App\Models\Shop\Product;

class IndexController extends Controller
{
    public function home()
    {
        $new_products = Product::where([
            ['status', 1],
            ['special', 1],
        ])->latest()->limit(12)->get();

        $most_sold = Product::where([
            ['status', 1],
            ['most_sold', 1],
        ])->latest()->limit(8)->get();

        $special_categories = Category::where([
            ['status', 1],
            ['special', 1],
        ])->limit(6)->get();

        $banners_sliders = Banner::where('status', 1)->get()->groupBy('position');

        return view('user.home', compact('banners_sliders', 'new_products', 'special_categories', 'most_sold'));

    }

    public function faq()
    {
        $faqs = Faq::get();

        return view('user.faq', compact('faqs'));
    }
}
