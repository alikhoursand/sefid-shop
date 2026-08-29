<?php

namespace App\Models\Shop;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public const STATUS_PENDING = 1; #yes
    public const STATUS_GATEWAY = 2; #yes
    public const STATUS_PAID = 3; #5
    public const STATUS_FAILED = 4; #yes
    public const STATUS_DONE = 5;


    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'cost',
        'tax',
        'discount',
        'discount_id',
        'status',
        'post',
        'address',
        'tracking_id',
        'paid_at',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
