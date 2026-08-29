<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $fillable = [
        'code',
        'amount',
        'status',
        'type',
        'expire_at',
        'one_time'
    ];
}
