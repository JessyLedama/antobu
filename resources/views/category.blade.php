@extends('layouts.app')

@section('content')
<section>
    <main>
        <!-- PRODUCTS -->
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    @foreach($category->products as $product)
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