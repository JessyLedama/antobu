<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_ids',
        'user_id',
    ];

    // order belongsTo user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // an order hasMany products
    public function products()
    {
        return $this->hasMany(Product::class, 'product_ids');
    }
}
