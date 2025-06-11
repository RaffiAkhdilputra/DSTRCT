<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'session_id', // For guest carts
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalPriceAttribute(): float
    {
        return $this->items->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity);
    }
}