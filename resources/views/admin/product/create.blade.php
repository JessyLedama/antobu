@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Products
    </h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.product.xlsx') }}" class="btn btn-sm btn-outline-secondary">
          XLSX
        </a>

        <a href="{{ route('admin.product.csv') }}" class="btn btn-sm btn-outline-secondary">
          CSV
        </a>
      </div>

      <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button> -->
    </div>
  </div>

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