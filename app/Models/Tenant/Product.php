<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'tenant';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'cost_price',
        'stock_quantity',
        'low_stock_threshold',
        'status',
        'sort_order',
    ];
    protected $casts = [
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'low_stock_threshold' => 'integer',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
