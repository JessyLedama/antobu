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
                                <h1>
                                    {{ ucfirst($slide->name) }}
                                </h1>
                                
                                <p class="opacity-75">
                                    {{ $slide->caption }}
                                </p>
                                
                                <p>
                                    <a class="btn btn-lg btn-primary" href="#">
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
                    <a href="{{ route('product.show', $product->slug) }}">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('/storage/'.$product->image) }}" alt="" width="100%" height="225">

                                <div class="card-body">

                                    <h3 class="card-text">
                                        {{ ucwords($product->name) }}
                                    </h3>

                                    <!-- <p class="card-text">
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p> -->
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-body-secondary">
                                            KSh. {{ $product->price }}
                                        </small>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</section>
@endsection