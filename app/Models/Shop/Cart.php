<?php

namespace App\Models\Shop;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Institute\Models\Course;

class Cart extends Model
{
    protected $fillable = ['user_id', 'course_id','product_id','qty'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
