<?php

namespace App\Classes\Shop;

use App\Models\Shop\Cart;
use App\Models\SiteSetting;
use App\Models\Shop\Product;
use Illuminate\Support\Facades\Auth;


class CartHelper
{
    public static function clearCart($user_id = null)
    {
        if (session()->has('cart')) {
            session()->forget('cart');
        }

        Cart::where('user_id', $user_id != null ? $user_id : Auth::id())->delete();
    }

    public static function getCart()
    {

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
                ->with('product')
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->product_id,
                        'title' => $item->product->title,
                        'slug' => $item->product->slug,
                        'image' => $item->product->image,
                        'price' => $item->product->price,
                        'off_price' => $item->product->off_price,
                        'qty' => $item->qty,
                    ];
                })
                ->toArray();
        } else {
            $cart = session()->get('cart') ?? [];
        }

        return $cart;
    }


    public static function validate($cart_items)
    {
        $result = [
            'status' => true,
            'products' => []
        ];

        foreach ($cart_items as $cart_item) {
            if ($cart_item->qty > $cart_item->product->qty) {
                $result['status'] = false;
                array_push($result['products'], $cart_item);
            }
        }

        return $result;
    }

    public static function getCartDetails($cart_items)
    {
        $total_price = 0;
        $products_discount = 0;
        $payable_amount = 0;
        $post_cost = SiteSetting::getWithKey('post_cost');


        foreach ($cart_items as $item) {
            $total_price += $item->product->price * $item->qty;

            if ($item->product->off_price != 0) {
                $products_discount += ($item->product->price - $item->product->off_price) * $item->qty;
                $payable_amount += $item->product->off_price * $item->qty;
            } else {
                $payable_amount += $item->product->price * $item->qty;
            }
        }

        $order = OrderHelper::getActiveOrder();
        $cost_handler = OrderHelper::handleOrderCost($payable_amount, $order ? $order->discount_id : null);


        return [
            'total_price' => $total_price,
            'products_discount' => $products_discount,
            'payable_amount' => $payable_amount,
            'real_discount' => $cost_handler['discount_amount'],
            'real_discount_id' => $cost_handler['discount_id'],
            'tax_amount' => count($cart_items) > 0 ? $cost_handler['tax_amount'] : 0,
            'post_cost' => count($cart_items) > 0 ? $post_cost : 0,
        ];
    }

    public static function checkProductInCart($product_id)
    {
        if (Auth::check()) {
            $existing_item = Cart::where('user_id', Auth::id())
                ->where('product_id', $product_id)
                ->first();

            return $existing_item ? $existing_item->qty : null;
        }

        $cart = session('cart', []);

        foreach ($cart as $key => $item) {
            if ($key == $product_id) {
                return $item['qty'];
            }
        }

        return false;
    }

    public static function modify($product, $action, $qty = 1)
    {
        if (Auth::check()) {
            $existing = Cart::where([
                ['user_id', Auth::id()],
                ['product_id', $product->id]
            ])->first();

            if ($existing) {

                if ($action === 'add') {

                    if ($existing->qty + $qty <= $product->qty) {
                        $result = $existing->update(['qty' => $existing->qty + $qty]);
                        $message = 'محصول به سبد خرید اضافه شد';
                    } else {
                        $result = false;
                        $message = 'مقدار انتخاب شده بیشتر از موجودی انبار است!';
                    }
                } else {

                    if ($existing->qty <= 1) {
                        $result = $existing->delete();
                        $message = 'محصول از سبد خرید حذف شد';
                    } else {
                        $result = $existing->update(['qty' => $existing->qty - $qty]);
                        $message = 'سبد خرید ویرایش شد';
                    }
                }
            } else {
                if ($action === 'add') {
                    $result = Cart::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product->id,
                        'qty' => $qty
                    ]);
                    $message = 'محصول به سبد خرید اضافه شد';
                } else {
                    $result = false;
                    $message = 'در سبد خرید شما موجود نیست';
                }
            }
        } else {
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id])) {

                if ($action === 'add') {
                    if ($cart[$product->id]['qty'] + $qty <= $product->qty) {
                        $cart[$product->id]['qty'] += $qty;
                        $result = true;
                        $message = 'محصول به سبد خرید اضافه شد';
                    } else {
                        $result = false;
                        $message = 'مقدار انتخاب شده بیشتر از موجودی انبار است!';
                    }
                } else {
                    if ($cart[$product->id]['qty'] <= 1) {
                        unset($cart[$product->id]);
                        $result = true;
                        $message = 'محصول از سبد خرید حذف شد';
                    } else {
                        $result = true;
                        $message = 'سبد خرید ویرایش شد';
                        $cart[$product->id]['qty'] -= $qty;
                    }
                }
            } else {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'price' => $product->price,
                    'off_price' => $product->off_price,
                    'qty' => $qty,
                ];

                $result = true;
                $message = 'محصول به سبد خرید اضافه شد';
            }

            session()->put('cart', $cart);
        }


        return ['status' => $result, 'message' => $message];
    }

    public static function checkProduct($product, $qty)
    {
        if ($product->qty < $qty) {
            return false;
        }

        return true;
    }

    public static function transferItemsToDb()
    {
        $session_cart = session()->get('cart');

        if ($session_cart != null) {
            foreach ($session_cart as $key => $s_cart) {
                self::modify(Product::find($key), 'add', $s_cart['qty']);
            }
        }
        session()->forget('cart');
    }
}
