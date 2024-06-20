<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class Cart extends Component
{
    public $cart;
    public $cartCount;
    public $subtotal;
    public $total;
    public $count = 1;

    protected $listeners = ['quantityUpdated' => 'updateCart'];

    public function mount()
    {
        $this->getCart();
        $this->getCartCount();
        $this->getSubtotal();
        $this->increment();
        $this->decrement();
    }


    // get cart
    public function getCart()
    {
        $this->cart = CartService::getCart();
    }

    // get cart count
    public function getCartCount()
    {
        $this->cartCount = CartService::getCartCount();
    }

    // get subtotal
    public function getSubtotal()
    {
        // 
    }

    // get total
    public function getTotal()
    {
        $this->total = CartService::total();
    }

    // increment
    public function increment()
    {
        $this->count++;

        $this->subtotal = $this->count;
    }

    // decrement
    public function decrement()
    {
        if($this->count > 1)
        {
            $this->count--;

            $this->subtotal = $this->count;
        }
    }

    // update cart
    public function updateCart($productId, $quantity)
    {
        // update the item in the array with a new quantity.
        $this->cart['productId']['quantity'] = $quantity;

        // save updated cart back to session
        session()->put('cart', $this->cart);

        // recalculate cart total
        CartService::getTotal();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
