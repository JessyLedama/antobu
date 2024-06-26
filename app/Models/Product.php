<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'slug', 'price', 'image', 'digital_asset', 'user_id', 'status_id', 'product_category_id', 'more_images', 'more_info', 'warranty_info', 'shipping_info', 'size', 'brand_id', 'material', 'color', 'rating', 'description',
    ];

    // product belongsTo user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // product belongsTo() category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    // product belongsTo() status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    // product belongsTo() brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
