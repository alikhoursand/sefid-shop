<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Shop\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Category;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function products(Request $request)
    {
        $products = Product::query()
            ->where('status', 1)
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('title', 'like', '%'.$request->q.'%')
                        ->orWhere('code', $request->q);
                });
            })
            ->when($request->filled('category'), function ($q) use ($request) {
                $cat = Category::where('slug', $request->category)->first();
                if ($cat) {
                    $q->where('category_id', $cat->id);
                }
            })
            ->when($request->boolean('avail'), function ($q) {
                $q->where('qty', '!=', 0);
            })
            ->when($request->boolean('offer'), function ($q) {
                $q->where('off_price', '!=', 0);
            })
            ->orderByRaw('CASE WHEN qty = 0 THEN 1 ELSE 0 END ASC');

        switch ($request->sort) {
            case 'newest':
                $products->orderBy('id', 'desc');
                break;
            case 'lowest_price':
                $products->orderByRaw('CASE WHEN off_price > 0 THEN off_price ELSE price END ASC');
                break;
            case 'highest_price':
                $products->orderByRaw('CASE WHEN off_price > 0 THEN off_price ELSE price END DESC');
                break;
            case null:
                $products->orderBy('id', 'desc');
                break;
            default:
                $products->orderBy('most_sold', 'desc');
                break;
        }

        $categories = Category::get();
        $products = $products->paginate(18)->appends($request->query());

        return view('user.shop.product-list', [
            'products' => $products,
            'categories' => $categories,
            'shop_type' => 'normal',
            'search_route' => route('shop.product.list'),
        ]);
    }

    public function offers(Request $request)
    {
        $products = Product::query()
            ->where('status', 1)
            ->where('off_price', '!=', 0)
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('title', 'like', '%'.$request->q.'%')
                        ->orWhere('code', $request->q);
                });
            })
            ->when($request->filled('category'), function ($q) use ($request) {
                $cat = Category::where('slug', $request->category)->first();
                if ($cat) {
                    $q->where('category_id', $cat->id);
                }
            })
            ->when($request->boolean('avail'), function ($q) {
                $q->where('qty', '!=', 0);
            })
            ->orderByRaw('CASE WHEN qty = 0 THEN 1 ELSE 0 END ASC');

        switch ($request->sort) {
            case 'newest':
                $products->orderBy('id', 'desc');
                break;
            case 'lowest_price':
                $products->orderByRaw('CASE WHEN off_price > 0 THEN off_price ELSE price END ASC');
                break;
            case 'highest_price':
                $products->orderByRaw('CASE WHEN off_price > 0 THEN off_price ELSE price END DESC');
                break;
            case null:
                $products->orderBy('id', 'desc');
                break;
            default:
                $products->orderBy('most_sold', 'desc');
                break;
        }

        $categories = Category::get();
        $products = $products->paginate(18)->appends($request->query());

        return view('user.shop.product-list', [
            'products' => $products,
            'categories' => $categories,
            'shop_type' => 'offers',
            'search_route' => route('shop.offers'),
        ]);
    }

    public function categories()
    {
        $categories = Category::get();

        return view('user.pages.shop.categories', compact('categories'));
    }

    public function view(Product $product)
    {
        $in_cart = CartHelper::checkProductInCart($product->id);

        $similar_products = Product::where([
            ['status', 1],
            ['category_id', $product->category->id],
        ])->limit(8)->get();

        $product->load('images');
        $product->comments = [];

        return view('user.shop.product-details', compact('product', 'in_cart', 'similar_products'));
    }
}
