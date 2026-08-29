<?php

namespace App\Models\Shop;


use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public const STATUS_PENDING = 1;
    public const STATUS_SUCCESS = 2;
    public const STATUS_VERIFIED = 3;
    public const STATUS_FAILED = 4;
    public const STATUS_CANCELED = 5;
    public const STATUS_UNKNOWN = 6;
    public const STATUS_GATEWAY = 7;

    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'order_id',
        'code',
        'amount',
        'status',
        'bank_status',
        'track_id',
        'bank_order_id',
        'ref_id',
        'trace',
        'card',
        'bank_message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function order()
    {
        return $this->BelongsTo(Order::class, 'order_id');
    }
}
