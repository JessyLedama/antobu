@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2 theme-primary-color">
      Products
    </h1>
    
    <div class="btn-toolbar mb-2 mb-md-0 theme-secondary-color">
      <div class="btn-group me-2">
        <a href="{{ route('admin.product.xlsx') }}" class="btn btn-sm btn-outline-secondary theme-primary-color">
          XLSX
        </a>

        <a href="{{ route('admin.product.csv') }}" class="btn btn-sm btn-outline-secondary theme-primary-color">
          CSV
        </a>
      </div>

      <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button> -->
    </div>
  </div>

  <!-- breadcrumbs -->
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}" class="theme-primary-color">
            Dashboard
          </a>
        </li>

        <li class="breadcrumb-item">
          <a href="{{ route('product.index') }}" class="theme-primary-color">
            Products
          </a>
        </li>
        
        <li class="breadcrumb-item theme-secondary-color" aria-current="page">
          Create Product
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('product.index') }}">
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

    <div class="row">
      <div class="mb-3 col-8">
        <label for="name" class="form-label theme-secondary-color">
          Product Name
        </label>

        <input name="name" type="text" class="form-control theme-input-form" id="" placeholder="Enter Product Name" required>
      </div>

      <div class="mb-3 col-4">
        <label for="image" class="form-label theme-secondary-color">
          Product Image
        </label>

        <input name="image" type="file" class="form-control theme-input-form" id="" required>
      </div>

      <div class="mb-3 col-4">
        <label for="category" class="form-label theme-secondary-color">
          Product Category
        </label>

        <select name="product_category_id" id="" class="form-control theme-input-form" required>
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

      <div class="mb-3 col-4">
        <label for="name" class="form-label theme-secondary-color">
          Product Price
        </label>

        <input name="price" type="text" class="form-control theme-input-form" id="" placeholder="Enter Product Price" required>
      </div>

      <div class="mb-3 col-4">
        <label for="name" class="form-label theme-secondary-color">
          Digital Asset
        </label>

        <input name="digital_asset" type="file" class="form-control theme-input-form" id="">
      </div>
    </div>

    <input type="submit" value="Save" class="new-btn theme-primary-btn">
  </form>
</main>
@endsection