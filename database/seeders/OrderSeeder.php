<?php

namespace Database\Seeders;

use App\Classes\SiteHelper;
use App\Models\Shop\Order;
use App\Models\Shop\OrderItem;
use App\Models\Shop\Product;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            $user = User::inRandomOrder()->first();
            $products = Product::take(3)->get();
            $products_array = [];
            $tax = SiteHelper::getSetting('tax_percent');
            $cost = 0;

            $products->each(function (Product $product) use (&$products_array) {
                $products_array[$product->id] = [
                    'qty' => rand(1, 4),
                    'price' => $product->price,
                ];
            });


            $order = Order::create([
                'user_id' => $user->id,
                'cost' => $cost,
                'tax' => 0,
                'post' => SiteHelper::getSetting('post_cost'),
                'address' => '{"fname":"fa","lname":"be","postal_code":"4163915673","address":"\u0628\u0644\u0648\u0627\u0631 \u0646\u0645\u0627\u0632 - \u06a9\u0648\u0686\u0647 \u06cc \u0627\u0633\u062a\u0627\u062f \u0645\u0639\u06cc\u0646 - \u0628\u0646 \u0628\u0633\u062a \u0648\u062d\u062f\u062a - \u067e\u0644\u0627\u06a9 \u06f1\u06f4\u06f6 - \u0637\u0628\u0642\u0647 \u0627\u0648\u0644","state_id":"2","city_id":"150"}',
                'paid_at' => Carbon::now()->subMonths(rand(1, 3)),
                'status' => Order::STATUS_PAID,
                'discount' => 0,
            ]);

            foreach ($products_array as $key => $product) {

                $cost += $product['price'] * $product['qty'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $key,
                    'qty' => $product['qty'],
                    'price' => $product['price'],
                ]);
            }


            $order->update([
                'cost' => $cost,
                'tax' => $tax == 0 ? 0 : ($cost * $tax) / 100,
            ]);

        }
    }
}
