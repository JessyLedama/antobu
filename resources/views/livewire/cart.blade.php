<div> 
    <div class="cart-contents">
        @foreach($cart as $item)
            @if(is_array($item))
                <tr>
                    <td class="p-4">
                        <div class="media align-items-center">
                            <img src="{{ asset('storage/'.$item['image']) }}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                            
                            <div class="media-body">
                                <a href="#" class="d-block text-dark">
                                    {{ $item['name'] }} 
                                </a>

                                <small>
                                    <span class="text-muted">
                                        Color:
                                    </span>
                                    
                                    <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                    
                                    <span class="text-muted">
                                        Size: 
                                    </span> 
                                    
                                    EU 37 &nbsp;
                                    
                                    <span class="text-muted">
                                        Ships from: 
                                    </span> 
                                    
                                    China
                                </small>
                            </div>
                        </div>
                    </td>

                    <td class="text-right font-weight-semibold align-middle p-4">
                        {{ $item['price'] }} 
                    </td>
                    
                    <td class="align-middle p-4">
                        <livewire:cart-counter :productId="$item['id']" :key="$item['id']">
                    </td>
                    
                    <td class="text-right font-weight-semibold align-middle p-4">
                        $115.1
                    </td>
                    
                    <td class="text-center align-middle px-0">
                        <a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">
                            ×
                        </a>
                    </td>
                </tr>
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
