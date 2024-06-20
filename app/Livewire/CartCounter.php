<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Services\ProductService;

class CartCounter extends Component
{
    public $count = 1;

    public $subtotal;

    public $total = 0;

    public $productId;

    public $asset;

    public $quantity;
    
    public function mount($productId)
    {
        $this->productId = $productId;

        $this->asset = ProductService::searchById($this->productId);

        $this->subtotal = $this->asset->price;

        $this->quantity = session()->get("cart.$productId.quantity", 1);
    }

    // increment
    public function increment()
    {
        $this->count++;

        $this->getSubtotal();

        $this->updateCart();
    }

    // decrement
    public function decrement()
    {
        if($this->count > 1)
        {
            $this->count--;

            $this->getSubtotal();

            $this->updateCart();
        }
    }

    // update cart
    protected function updateCart()
    {
        // update the cart in the session
        session()->put("cart.$this->productId.quantity", $this->quantity);

        // emit an event to notify the parent component
        $this->emit('quantityUpdated', $this->productId, $this->quantity);
    }

    // get subtotal
    public function getSubtotal()
    {
        $this->subtotal = $this->count * $this->asset->price;
    }

    public function render()
    {   
        return view('livewire.cart-counter');
    }
}
