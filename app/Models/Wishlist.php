<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    protected $table = 'wishlists';

    // Wishlist belongsTo() a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // wishlist belongsTo() a product
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
