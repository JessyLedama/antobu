<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\ProductService;

class CartController extends Controller
{
    // view cart
    public function viewCart()
    {
        $cart = CartService::getCart();

        return view('cart', compact('cart'));
    }

    // add to cart
    public function addToCart($slug)
    {
        $product = ProductService::searchBySlug($slug);

        CartService::addToCart($product);

        return back();
    }

    // remove from cart
    public function removeFromCart($product)
    {
        CartService::removeFromCart($product);

        session()->flash('success', 'Product removed from cart');

        return back();
    }

    // clear cart
    public function clearCart()
    {
        CartService::clearCart();

        return response('cart cleared', 200)->header('Content-Type', 'text/plain');
    }

    // cart page
    public function cart()
    {
        // $cart = session('cart');
        $cart = CartService::getCart();

        return view('cart', compact('cart'));
    }

    // checkout page
    public function checkout()
    {
        $cart = CartService::getCart();

        return view('checkout', compact('cart'));
    }
}
