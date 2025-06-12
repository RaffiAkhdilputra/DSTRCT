<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The wishlist that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function wishlist(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'wishlist', 'user_id', 'product_id');
    }

    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function createOrderFromCart(array $shippingData): Order
    {
        $cart = $this->cart()->with('items.product')->firstOrFail();
        $items = $cart->items;

        if ($items->isEmpty()) {
            throw new \Exception('Cart is empty.');
        }

        return DB::transaction(function () use ($items, $shippingData, $cart) {
            $order = $this->orders()->create([
                'order_number' => 'ORD-' . now()->format('Ymd-His') . '-' . Str::upper(Str::random(5)),
                'total_amount' => $items->sum(fn($item) => $item->quantity * $item->product->price),
                'status' => 'pending',
                'shipping_address' => $shippingData['shipping_address'],
                'shipping_city' => $shippingData['shipping_city'],
                'shipping_postcode' => $shippingData['shipping_postcode'],
                'shipping_country' => $shippingData['shipping_country'],
                'shipping_method' => $shippingData['shipping_method'] ?? null,
                'notes' => $shippingData['notes'] ?? null,
            ]);

            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->quantity * $item->product->price,
                ]);
            }

            $cart->items()->delete(); // Clear cart

            return $order;
        });
    }
}