@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


<main>
  @include('admin.sidebar')
  <h2>
    New Product
  </h2>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.product.index') }}">
      All Products
    </a>
  </div>

  <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">
        Product Name
      </label>

      <input name="name" type="text" class="form-control" id="" placeholder="Enter Product Name" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Slideshow Image
      </label>

      <input name="image" type="file" class="form-control" id="exampleFormControlInput1" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">
        Caption
      </label>

      <textarea name="caption" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection