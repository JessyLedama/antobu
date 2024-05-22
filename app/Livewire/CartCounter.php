<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Services\DigitalAssetService;

class CartCounter extends Component
{
    public $count = 1;

    public $subtotal;

    public $total = 0;

    public $productId;

    public $asset;

    
    public function mount($productId)
    {
        $this->productId = $productId;

        $this->asset = DigitalAssetService::searchById($this->productId);

        $this->subtotal = $this->asset->price;
    }

    // increment
    public function increment()
    {
        $this->count++;

        $this->getSubtotal();
    }

    // decrement
    public function decrement()
    {
        if($this->count > 1)
        {
            $this->count--;

            $this->getSubtotal();
        }
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
