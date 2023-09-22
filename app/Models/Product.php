<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = ['category_id', 'user_id', 'name', 'description', 'stock', 'price', 'image'];

    // Product relation with category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Product relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Product relation with order items
    public function orderitems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
