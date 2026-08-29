<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Shop\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Cart;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = Cart::where('user_id', Auth::id())->with('product')->get();
        $cart_details = CartHelper::getCartDetails($cart_items);
        $validated = CartHelper::validate($cart_items);

        if (!$validated['status']) {
            return view('user.shop.cart', compact('cart_items', 'cart_details'))->with('cart_error', [
                'message' => 'لطفا سبد خرید را بررسی کنید!',
                'products' => $validated['products'],
            ]);
        }


        return view('user.shop.cart', compact('cart_items', 'cart_details'));
    }

    public function store(Product $product, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'action' => 'required',
        ], [
            'action.required' => 'خطا! لطفا دوباره تلاش کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = CartHelper::modify($product, $request->action);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'سبد خرید خالی شد');
    }

    public function remove($product)
    {
        if (Auth::check()) {
            $deleted = Cart::where([
                ['product_id', $product],
                ['user_id', Auth::id()],
            ])->delete();
        } else {
            $cart = session()->get('cart');

            if (isset($cart[$product])) {
                unset($cart[$product]);
                session()->put('cart', $cart);
                $deleted = true;
            }
        }


        if ($deleted) {
            return redirect()->back()->with('success', 'محصول از سبد خرید حذف شد');
        }
        return redirect()->back()->with('error', 'محصول از سبد خرید حذف نشد');
    }
}
