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

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

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
        Product Image
      </label>

      <input name="image" type="file" class="form-control" id="" required>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">
        Product Category
      </label>

      <select name="product_category_id" id="" class="form-control" required>
        <option value="">
          Select a category
        </option>

        @foreach($categories as $category)
          <option value="{{ $category->id }}">
            {{ ucwords($category->name) }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">
        Product Price
      </label>

      <input name="price" type="text" class="form-control" id="" placeholder="Enter Product Price" required>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">
        Digital Asset
      </label>

      <input name="digital_asset" type="file" class="form-control" id="">
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection