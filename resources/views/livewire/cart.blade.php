<div>
    
    <div class="cart-contents">
        @foreach($cart as $item)
            @if(is_array($item))
                <div class="row">
                    <div class="col-md-4">
                        <span>
                            <img class="asset-image" src="{{ asset('storage/'.$item['image']) }}" alt="">
                        </span>
                    </div>

                    <div class="col-md-7">
                        <span class="asset-name"> 
                            {{ $item['name'] }} 
                        </span> <br/>

                        <span class="asset-price"> 
                            Price: {{ $item['price'] }} 
                        </span> <br>
                        
                        <livewire:cart-counter :productId="$item['id']" :key="$item['id']">
                    </div>
                </div>
            @endif
        @endforeach

        <div class="row">
            <div class="col-md-5 offset-4">
                <strong class="cart-total">
                    Total

                    <span class="asset-price"> 
                        Ksh. {{ $cart['total'] }} 
                    </span> <br>
                </strong>
            </div>
        </div>
    </div>
</div>
