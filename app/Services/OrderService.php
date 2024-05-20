<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    // get orders
    public static function orders()
    {
        $orders = Order::all();

        return $orders;
    }

    // store new order
    public static function store($validated)
    {
        // 
    }
}