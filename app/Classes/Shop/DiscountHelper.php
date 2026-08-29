<?php

namespace App\Classes\Shop;

use App\Models\Shop\Discount;
use App\Models\Shop\Order;
use Carbon\Carbon;

class DiscountHelper
{

    public static function handle($order, $discount)
    {
        $check_order_result = self::checkOrder($order);

        if (!$check_order_result['status']) {
            return $check_order_result;
        }

        $check_discount_code_result = self::validateDiscount($discount);
        if (!$check_discount_code_result['status']) {
            return $check_discount_code_result;
        }

        return self::apply($order, $discount);
    }

    private static function checkOrder($order): array
    {

        if ($order) {
            if ($order->discount != 0 || $order->discount_id != null) {
                return ['status' => false, 'message' => 'در حال حاظر بر روی سفارش شما تخفیف اعمال شده است.'];
            } else {
                return ['status' => true];
            }
        } else {
            return ['status' => false, 'message' => 'خطا در دریافت سفارش.'];
        }
    }

    private static function validateDiscount($discount): array
    {
        if ($discount) {
            // check if exists
            if ($discount->status == 0) {
                // check if status is active
                return ['status' => false, 'message' => 'کد تخفیف وارد شده غیر فعال است.'];
            } elseif ($discount->expire_at != null) {
                // check if it has expiry date
                if (Carbon::parse($discount->expire_at)->isBefore(now())) {
                    // check if it is expired
                    return ['status' => false, 'message' => 'کد تخفیف منقضی شده است.'];
                } else {
                    // it's OK
                    return ['status' => true];
                }
            } else {
                // it's OK
                return ['status' => true];
            }
        } else {
            return ['status' => false, 'message' => 'کد تخفیف وارد شده نامعتبر است.'];
        }
    }

    public static function apply($order, $discount)
    {
        $order_handler = OrderHelper::handleOrderCost($order->cost, $discount->id);

        $result = $order->update([
            'discount' => $order_handler['discount_amount'],
            'discount_id' => $discount->id,
            'tax' => $order_handler['tax_amount'],
        ]);

        if ($result) {
            self::checkDiscount($discount);
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'خطا در ثبت تخفیف. لطفا دوباره تلاش کنید'];
        }
    }

    private static function checkDiscount($discount)
    {
        if ($discount->one_time == 1) {
            $discount->update(['status' => 0]);
        }
    }
}
