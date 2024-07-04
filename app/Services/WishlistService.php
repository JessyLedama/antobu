<?php

namespace App\Services;

use App\Models\Wishlist;

class WishlistService
{
    /**
     *  Get all wishlists
     *  Order by user
     */

    public static function wishlists()
    {
        $wishlists = Wishlist::orderBy('user_id')->get();

        return $wishlists;
    }

    /**
     *  Store a new wishlist
     *  
     */
    public static function store($wishlistData)
    {
        $wishlist = Wishlist::create($wishlistData);

        return $wishlist;
    }


}