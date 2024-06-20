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
        'name',
        'slug',
        'price',
        'image',
        'digital_asset',
        'user_id',
        'status_id',
        'product_category_id',
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
}
