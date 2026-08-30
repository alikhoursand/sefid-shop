<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Shop\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Cart;
use App\Models\Shop\Product;
use App\Models\Shop\Categories;
use Illuminate\Http\Request;
use Modules\Institute\Models\Course;

class ShopController extends Controller
{
    public function index(Categories $category, Request $request)
    {
        $params = [
            ['status', 1],
            ['category_id', $category->id],
        ];


        if ($request->title) {
            $params[] = ['title', 'like', '%' . $request->title . '%'];
        }

        if ($request->avail && $request->avail == '1') {
            $params[] = ['qty', '!=', 0];
        }

        if ($request->offer && $request->offer == '1') {
            $params[] = ['off_price', '!=', 0];
        }

        $products = Product::where($params);

        $products->orderByRaw("CASE WHEN qty = 0 THEN 1 ELSE 0 END ASC");

        if ($request->sort) {
            switch ($request->sort) {
                case 'newest':
                    $products->orderBy('id', 'desc');
                    break;
                case 'lowest_price':
                    $products->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END ASC");
                    break;
                case 'highest_price':
                    $products->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END DESC");
                    break;
                default:
                    $products->orderBy('most_sold', 'desc');
                    break;
            }
        } else {
            $products->orderBy('id', 'desc');
        }


        if ($request->max_price) {
            $min = $request->min_price ?? 1000;
            $products = $products->whereBetween('price', [$min, $request->max_price]);
        }

        $products = $products->paginate(16)->appends(request()->query());

        return view('user.shop.main', compact('products', 'category'));
    }

    public function products(Request $request)
    {
        $params = [
            ['status', 1],
        ];

        if ($request->title) {
            $params[] = ['title', 'like', '%' . $request->title . '%'];
        }

        if ($request->avail && $request->avail == '1') {
            $params[] = ['qty', '!=', 0];
        }

        if ($request->offer && $request->offer == '1') {
            $params[] = ['off_price', '!=', 0];
        }

        $products = Product::where($params);

        $products->orderByRaw("CASE WHEN qty = 0 THEN 1 ELSE 0 END ASC");

        if ($request->sort) {
            switch ($request->sort) {
                case 'newest':
                    $products->orderBy('id', 'desc');
                    break;
                case 'lowest_price':
                    $products->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END ASC");
                    break;
                case 'highest_price':
                    $products->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END DESC");
                    break;
                default:
                    $products->orderBy('most_sold', 'desc');
                    break;
            }
        } else {
            $products->orderBy('id', 'desc');
        }

        if ($request->max_price) {
            $min = $request->min_price ?? 1000;
            $products = $products->whereBetween('price', [$min, $request->max_price]);
        }

        $products = $products->paginate(16)->appends(request()->query());

        return view('user.shop.product-list', compact('products'));
    }

    public function offers(Request $request)
    {
        $params = [
            ['status', 1],
            ['off_price', '!=', 0]
        ];


        if ($request->title) {
            $params[] = ['title', 'like', '%' . $request->title . '%'];
        }

        if ($request->avail && $request->avail == '1') {
            $params[] = ['qty', '!=', 0];
        }


        $offers = Product::where($params);

        $offers->orderByRaw("CASE WHEN qty = 0 THEN 1 ELSE 0 END ASC");

        if ($request->sort) {
            switch ($request->sort) {
                case 'newest':
                    $offers->orderBy('id', 'desc');
                    break;
                case 'lowest_price':
                    $offers->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END ASC");
                    break;
                case 'highest_price':
                    $offers->orderByRaw("CASE WHEN off_price > 0 THEN off_price ELSE price END DESC");
                    break;
                default:
                    $offers->orderBy('most_sold', 'desc');
                    break;
            }
        } else {
            $offers->orderBy('id', 'desc');
        }


        if ($request->max_price) {
            $min = $request->min_price ?? 1000;
            $offers = $offers->whereBetween('price', [$min, $request->max_price]);
        }

        $offers = $offers->paginate(16)->appends($request->query());

        return view('user.shop.offers', compact('offers'));
    }

    public function categories()
    {
        $categories = Categories::get();

        return view('user.pages.shop.categories', compact('categories'));
    }

    public function view(Product $product)
    {
        $in_cart = CartHelper::checkProductInCart($product->id);

        $similar_products = Product::where([
            ['status', 1],
            ['category_id', $product->category->id]
        ])->limit(8)->get();


        $product->load('images');
        $product->comments = [];

        return view('user.shop.product-details', compact('product', 'in_cart', 'similar_products'));
    }

}
