<div style="text-align: left">
    <!-- <span> Quantity: </span> -->
    <button class="cart-button theme-primary-color" wire:click="decrement({{ $productId }})"> - </button>

    <span class="theme-primary-color">{{ $count }}</span>

    <button class="cart-button theme-primary-color" wire:click="increment({{ $productId }})">+</button> <br>
<!-- 
    <span>
        Subtotal: {{ $subtotal }}
    </span> -->
</div>
