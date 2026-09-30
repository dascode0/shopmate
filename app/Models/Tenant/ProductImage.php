<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $connection = 'tenant';
    protected $fillable = [
        'product_id',
        'image_path',
        'sort_order',
        'status',
    ];
    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
