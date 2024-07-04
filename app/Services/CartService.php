<?php

namespace App\Services;

use App\Services\DigitalAssetService;

class CartService 
{
    public function __construct()
    {
        if(!session()->has('cart'))
        {
            session(['cart' => []]);
        }
    }
    
    // get cart
    public static function getCart()
    {
        $cart = session('cart');
        $cart['total'] = self::total();
        $cart['count'] = self::getCartCount();

        return $cart;
    }

    // add to cart
    public static function addToCart($product, $quantity = 1)
    {
        $cart = session('cart');
                
        if(isset($cart[$product->id]))
        {
            // product exists in cart, so update quantity
            $cart[$product->id]['quantity'] += $quantity;
        }
        else {  
            // product doesnt exist in cart, so add it
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image,
                'id' => $product->id,
                'slug' => $product->slug,
            ];
        }
        
        session(['cart' => $cart]);
    }

    // remove from cart
    public static function removeFromCart()
    {
        $cart = self::getCart();

        if (isset($cart[$product])) 
        {
            unset($cart[$product]);
            session(['cart' => $cart]);
        }
    }

    // clear cart
    public static function clearCart()
    {
        session(['cart' => []]);
    }

    // get cart count
    public static function getCartCount()
    {
        $cart = session('cart');

        $count = 0;

        if($cart)
        {
            foreach($cart as $key => $item)
            {
                if(is_array($item))
                {
                    $count += 1;
                }
            }
            return $count;
        }

        return $count; // return 0 if cart is empty or not set.
    }

    // get cart total
    public static function total()
    {
        $cart = session('cart');

        $cart['total'] = 0;

        // compute total if cart has content.
        if(count($cart) > 0)
        {
            foreach($cart as $key => $item)
            {
                if(is_array($item) && isset($item['quantity']) && isset($item['price']))
                {
                    $cart['total'] += $item['quantity'] * $item['price'];
                }
            }
        }

        $total = $cart['total'];

        return $total;
    }
}