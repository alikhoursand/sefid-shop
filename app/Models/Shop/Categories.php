<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'special',
        'image',
        'status',
    ];

    public static function getTopLevelCategories()
    {
        return self::whereNull('parent_id')->get();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
