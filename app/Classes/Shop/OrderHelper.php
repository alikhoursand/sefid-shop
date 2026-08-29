<?php

namespace App\Classes\Shop;

use App\Models\Shop\Cart;
use App\Models\Shop\Order;
use App\Models\SiteSetting;
use App\Models\Shop\Discount;
use App\Models\Shop\OrderItem;
use Illuminate\Support\Facades\Auth;
use Modules\Institute\Models\UserCourse;


class OrderHelper
{

    // public static function disableDiscount($discount_id = null)
    // {
    //     if ($discount_id != null) {
    //         $discount = Discount::find($discount_id);

    //         if ($discount->one_time == 1) {
    //             $discount->update(['status' => 0]);
    //         }
    //     }
    // }


    // public static function getAll()
    // {
    //     $orders = ShopOrder::where('user_id', Auth::id)->get();
    //     return $orders;
    // }

    // public static function getAndSort()
    // {


    //     $orders = ShopOrder::where('user_id', Auth::id)->get();

    //     $sorted = [
    //         'total' => $orders ? count($orders) : 0,
    //         'total_price' => 0,
    //         'pending' => 0,
    //         'gateway' => 0,
    //         'paid' => 0,
    //         'done' => 0,
    //         'failed' => 0,
    //     ];

    //     foreach ($orders as $order) {

    //         switch ($order->status) {
    //             case ShopOrder::STATUS_PENDING:
    //             case ShopOrder::STATUS_GATEWAY:
    //                 $sorted['pending'] += 1;
    //                 break;
    //             case ShopOrder::STATUS_DONE:
    //                 $sorted['done'] += 1;
    //                 break;
    //             case ShopOrder::STATUS_PAID:
    //                 $sorted['paid'] += 1;
    //                 break;
    //             case ShopOrder::STATUS_FAILED:
    //                 $sorted['failed'] += 1;
    //                 break;
    //         }


    //         $sorted['total_price'] += $order->cost + $order->post + $order->tax - $order->discount;
    //     }

    //     return $sorted;
    // }

    // public static function getLastOrders($count = 3)
    // {
    //     $last_orders = ShopOrder::where('user_id', Auth::id)->orderBy('id', 'desc')->take($count)->get();
    //     return $last_orders;
    // }

    public static function getActiveOrderAddress($get_from_previous = false)
    {
        $current_order = Order::where('user_id', Auth::id())
            ->whereIn('status', [
                Order::STATUS_PENDING,
                Order::STATUS_GATEWAY,
                Order::STATUS_FAILED,
            ])->first();

        if ($current_order) {
            return [
                'address' => json_decode($current_order->address, true),
                'source' => 'current_order',
            ];
        }


        $previous_order = Order::where('user_id', Auth::id())
            ->whereIn('status', [
                Order::STATUS_DONE,
                Order::STATUS_PAID,
            ])->first();

        if ($previous_order) {
            return [
                'address' => json_decode($previous_order->address, true),
                'source' => 'previous_order',
            ];
        }


        return [
            'source' => 'not_exist',
            'address' => null,
            'fname' => null,
            'lname' => null,
            'postal_code' => null,
            'city' => null,
            'state' => null
        ];
    }

    public static function getActiveOrder()
    {
        return Order::where('user_id', Auth::id())
            ->whereIn('status', [
                Order::STATUS_PENDING,
                Order::STATUS_GATEWAY,
                Order::STATUS_FAILED,
            ])->latest()->first();
    }

    public static function handleOrderCost($payable_amount, $discount_id = null)
    {
        $discount_amount = 0;

        $tax_percent = SiteSetting::getWithKey('tax_percent');

        if ($discount_id != null) {
            $discount = Discount::find($discount_id);

            if ($discount->type == 1) {
                $discount_amount = $discount->amount;
            } else if ($discount->type == 2) {
                $discount_amount = $payable_amount * ($discount->amount / 100);
            }
        }

        $tax_amount = ($payable_amount - $discount_amount) * ($tax_percent / 100);

        return [
            'tax_amount' => $tax_amount,
            'discount_amount' => $discount_amount,
            'discount_id' => $discount_id,
        ];
    }

    public static function addCartItemsToOrder($order_id, $cart_data, $products)
    {

        foreach ($cart_data as $item) {

            $product = $products[$item['product_id']];

            if ($product->off_price !== 0) {
                $calculated_price = $product->off_price;
            } else {
                $calculated_price = $product->price;
            }

            OrderItem::create([
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $calculated_price,
            ]);
        }
    }
}
