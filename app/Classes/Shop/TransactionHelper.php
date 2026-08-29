<?php

namespace App\Classes\Shop;

use App\Models\Shop\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionHelper
{

    public static function getActiveTransaction($order, $invoice)
    {

        $order_transaction = Transaction::firstOrNew([
            'order_id' => $order->id,
            'status' => Transaction::STATUS_PENDING
        ]);

        $order_transaction->fill([
            'user_id' => Auth::id(),
            'code' => $invoice->getUuid(),
            'amount' => $invoice->getAmount(),
        ]);

        $order_transaction->save();

        return $order_transaction;
    }
}
