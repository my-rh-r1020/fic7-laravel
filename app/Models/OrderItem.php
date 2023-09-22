<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity'];

    // Order Item relation with order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Order Item relation with products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
