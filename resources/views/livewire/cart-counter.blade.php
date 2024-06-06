<div style="text-align: left">
    <!-- <span> Quantity: </span> -->
    <button class="cart-button" wire:click="decrement({{ $productId }})"> - </button>

    <span>{{ $count }}</span>

    <button class="cart-button" wire:click="increment({{ $productId }})">+</button> <br>
<!-- 
    <span>
        Subtotal: {{ $subtotal }}
    </span> -->
</div>
