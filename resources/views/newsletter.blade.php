@extends('layouts.app')
<!-- Product Styles -->
<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@section('content')
<main>

<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
        <aside class="col-lg-12">
            <div class="border rounded-4 mb-3 d-flex justify-content-center">
                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('storage/'.$newsletter->cover) }}" />
            </div>

            
            <!-- thumbs-wrap.// -->
            <!-- gallery-wrap .end// -->
        </aside>

        <main class="col-lg-6">
            <div class="ps-lg-3">
                <h2 class="title text-dark">
                    {{ ucfirst($newsletter->name) }}
                </h2>

                <p>
                    {!! $newsletter->content !!}
                </p>
            </div>
        </main>
    </div>
  </div>
</section>
<!-- content -->
@endsection