<?php

use App\Services\CartService;

?>

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">

<title> Cart | {{ config('app.name')}} </title>

@section('content')
<section class="row clearfix">
    <div class="body-container">
        <div class="title">
            <h1 class="title-text"> Cart </h1>
        </div>
    </div>

    @if(CartService::getCartCount() > 0)
        <div class="body row">
            <div class="cart-container col-md-10 offset-1">
                <livewire:cart>

                <div class="title right">
                    <a class="btn btn-primary" href="{{ route('checkout') }}">
                        <span class="checkout-title-text"> 
                            Proceed To Checkout 
                        </span>
                    </a>
                </div>
            </div>
        </div>
    @else 
        <div class="body row">
            <div class="cart-container col-md-12">
                <div class="cart-contents">
                    <span>
                        Your Cart is empty
                    </span>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection