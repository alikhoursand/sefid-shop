<?php

namespace Database\Seeders;

use App\Models\Shop\Order;
use App\Models\Shop\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::take(10)->get();

        foreach ($orders as $order) {
            Transaction::create([
                'order_id' => $order->id,
                'user_id' => $order->user->id,
                'code' => "random-code-$order->id",
                'amount' => $order->cost,
                'status' => Transaction::STATUS_VERIFIED,
                'bank_status' => null,
                'trace'=>rand(11111,99999),
                'track_id' => rand(1111111, 9999999),
                'ref_id' => rand(1111111, 9999999),
                'bank_order_id' => rand(1111, 9999),
                'card' => rand(1111, 9999),
            ]);
        }
    }
}
