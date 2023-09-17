<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = ['category_id', 'user_id', 'name', 'description', 'price', 'image_url'];

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
}
