<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'status',
        'sort_order'
    ];

    public function Product_category():BelongsTo
    {
        return $this->belongsTo(Product_category::class);
    }
}
