<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class CartCount extends Component
{    
    public $cartCount;

    protected $listeners = ['cartUpdated' => 'getCartCount'];

    public function mount()
    {
        $this->getCartCount();
    }

    public function getCartCount()
    {
        $this->cartCount = CartService::getCartCount();
    }

    
    public function render()
    {
        return view('livewire.cart-count');
    }
}
