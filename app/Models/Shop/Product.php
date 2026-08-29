<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'code',
        'status',
        'parent_id',
        'special',
        'image',
        'category_id',
        'price',
        'off_price',
        'qty',
        'most_sold',
        'rate',
        'desc',
        'disable_comment',
        'help',
        'help_desc'
    ];


    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
