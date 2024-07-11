<div> 
    <div class="cart-contents">
        @foreach($cart as $item)
            @if(is_array($item))
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item['image']) }}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                    </td>
                    <td class="p-4">
                        <div class="media align-items-center">
                            
                            <a href="{{ route('product.show', $item['slug']) }}" class="d-block text-dark theme-primary-color">
                                {{ $item['name'] }} 
                            </a>
                        </div>
                    </td>

                    <td class="text-right font-weight-semibold align-middle p-4 theme-primary-color">
                        {{ $item['price'] }} 
                    </td>
                    
                    <td class="align-middle p-4">
                        <livewire:cart-counter :productId="$item['id']" :key="$item['id']">
                    </td>
                    
                    <td class="text-right font-weight-semibold align-middle p-4 theme-primary-color">
                        {{ number_format($item['price'] * $item['quantity']), 2}}
                    </td>
                    
                    <td class="text-center align-middle px-0">
                        <a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">
                            ×
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
    </div>    
</div>
