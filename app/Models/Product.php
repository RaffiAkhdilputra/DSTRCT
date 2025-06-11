<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

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

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * The users that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist', 'product_id', 'user_id');
    }
}
