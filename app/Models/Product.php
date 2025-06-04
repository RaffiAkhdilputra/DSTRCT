<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'default_price',
        'price',
        'discount',
        'image',
        'current_rating',
        'category',
        'stock',
        'is_active',
        'link',
        'tags',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'default_price' => 'integer',
        'price' => 'integer',
        'discount' => 'integer',
        'stock' => 'integer',
        'current_rating' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
