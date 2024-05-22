<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Services\DigitalAssetService;
use App\Livewire\CartCount;

class AddToCart extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    // add to cart
    public function addToCart($id, CartCount $cartCount)
    {
        $product = DigitalAssetService::searchById($id);

        $cart = CartService::addToCart($product);

        $this->dispatch('cartUpdated');

        session()->flash('success', 'Item added to cart!');
    }


    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
