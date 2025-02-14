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
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.product.xlsx') }}" class="btn btn-sm btn-outline-secondary theme-secondary-color">
          XLSX
        </a>

        <a href="{{ route('admin.product.csv') }}" class="btn btn-sm btn-outline-secondary theme-secondary-color">
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
        
        <li class="breadcrumb-item theme-secondary-color" aria-current="page">
          Products
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.product.create') }}">
      New Product
    </a>
  </div>

  <!-- PRODUCTS -->
  <div class="album py-5 bg-body-tertiary theme-content-font">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
                      <a href="{{ route('admin.product.show', $product->slug) }}">  
                        <img src="{{ asset('/storage/'.$product->image) }}" alt="" class="admin-product-img">

                        <div class="card-body">
                          <p class="card-text theme-secondary-color theme-content-font">
                              {{ ucwords($product->name) }}
                          </p>
                        </div>
                      </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </div>
</main>

@endsection