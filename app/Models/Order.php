<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'seller_id', 'number', 'total_price', 'payment_status', 'payment_url', 'delivery_address'
    ];

    // Order relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Order relation with seller
    // public function seller(): BelongsTo
    // {
    //     return $this->belongsTo();
    // }

    // Order relation with orderitems
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
