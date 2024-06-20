<?php

use App\Services\CartService;

?>

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">

<title> Cart | {{ config('app.name')}} </title>

@section('content')
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if(CartService::getCartCount() > 0)
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3 px-4" style="min-width: 100px;">
                                    Product Image
                                </th>
                                
                                <th class="text-center py-3 px-4" style="min-width: 200px;">
                                    Product Name
                                </th>
                                
                                <th class="text-right py-3 px-4" style="width: 100px;">
                                    Price
                                </th>
                                
                                <th class="text-center py-3 px-4" style="width: 120px;">
                                    Quantity
                                </th>
                                
                                <th class="text-right py-3 px-4" style="width: 100px;">
                                   Sub Total (KSH)
                                </th>
                                
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;">
                                    <a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart">
                                        <i class="ino ion-md-trash"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <livewire:cart>
                        </tbody>
                    </table>
                    
                    <!-- Promo code -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="mt-4">
                            <label class="text-muted font-weight-normal">
                                Promo Code
                            </label>
                            <input type="text" placeholder="ABC" class="form-control">
                        </div>

                        <div class="d-flex">
                            <!-- <div class="text-right mt-4 mr-5">
                                <label class="text-muted font-weight-normal m-0">
                                    Discount
                                </label>
                                
                                <div class="text-large">
                                    <strong>
                                        $20
                                    </strong>
                                </div>
                            </div> -->

                            <div class="text-right mt-4">
                                <label class="text-muted font-weight-normal m-0">
                                    Order Total
                                </label>
                                
                                <div class="text-large">
                                    <strong>
                                        KSh. {{ $cart['total'] }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="float-right">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">
                            Back to shopping
                        </button>
                        
                        <button type="button" class="btn btn-lg btn-primary mt-2">
                            Checkout
                        </button>
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                Your cart is empty
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- / Shopping cart table -->
        </div>
    </div>
</div>
@endsection