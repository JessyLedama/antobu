@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


<main>
  @include('admin.sidebar')
  <h2>
    New Product Category
  </h2>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.productCategory.index') }}">
      All Product Categories
    </a>
  </div>

  <form action="{{ route('admin.productCategory.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">
        Name
      </label>

      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter product category name" required>
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection