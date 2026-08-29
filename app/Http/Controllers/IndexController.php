<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Faq;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\Shop\Categories;
use App\Models\Shop\Transaction;
use App\Models\Testimonial;
use App\Models\User\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $new_products = Product::where([
            ['status', 1],
            ['special', 1],
        ])->latest()->limit(12)->get();

        $faqs = Faq::get();


        $most_sold = Product::where([
            ['status', 1,],
            ['most_sold', 1],
        ])->latest()->limit(8)->get();

        $special_categories = Categories::where([
            ['status', 1],
            ['special', 1]
        ])->limit(6)->get();

        $banners_sliders = Banner::where('status', 1)->get()->groupBy('position');

        return view('user.home', compact('faqs', 'banners_sliders', 'new_products', 'special_categories', 'most_sold'));

    }

}
