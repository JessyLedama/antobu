@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">

@section('content')
<section>
    <main>
        <!-- CAROUSEL -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($slides as $index => $slide)
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="{{ ucfirst($slide->name) }}"></button>
                @endforeach
            </div>
            
            <div class="carousel-inner">
                @foreach($slides as $index => $slide)
                    <div class="carousel-item {{$index === 0 ? 'active' : ''}}">
                        <img class="bd-placeholder-img" src="{{ asset('storage/'.$slide->image) }}" width="100%" height="100%" alt="">

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="theme-title">
                                    {{ ucfirst($slide->name) }}
                                </h1>
                                
                                <p class="opacity-75">
                                    {{ $slide->caption }}
                                </p>
                                
                                <p>
                                    <a class="btn btn-lg primary-btn theme-primary-btn" href="#">
                                        Sign up today
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">
                    Previous
                </span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">
                    Next
                </span>
            </button>
        </div>

        <!-- PRODUCTS -->
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    @foreach($products as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="{{ route('product.show', $product->slug) }}">  
                                    <img src="{{ asset('/storage/'.$product->image) }}" alt="" width="100%" height="225">

                                    <div class="card-body">

                                        <h3 class="card-text theme-secondary-color">
                                            {{ ucwords($product->name) }}
                                        </h3>

                                        <p class="card-text">
                                            {{ ucfirst($product->description) }}
                                        </p>
                                    </div>

                                </a>
                                        
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-body-secondary theme-primary-color">
                                            KSh. {{ $product->price }}
                                        </small>

                                        <div class="btn-group">
                                            <a href="{{ route('addToCart', $product->slug) }}" type="button" class="btn btn-sm theme-primary-btn">
                                                <span class="fa fa-cart-plus"></span>
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</section>
@endsection