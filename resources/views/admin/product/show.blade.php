@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/company.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">
            Dashboard
          </a>
        </li>

        <li class="breadcrumb-item">
          <a href="{{ route('admin.settings') }}">
            Settings
          </a>
        </li>

        <li class="breadcrumb-item">
          <a href="{{ route('product.index') }}">
            Products
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          {{ ucwords($product->name) }}
        </li>
      </ol>
    </nav>
    
    <!-- export data -->
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
    <a class="new-btn" href="{{ route('admin.product.create') }}">
      New
    </a>

    <a class="new-btn" href="{{ route('admin.product.edit', $product->slug) }}">
      Edit
    </a>
  </div>

  <div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>

  <div class="row">
    <div class="col-md-6 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        <span class="fa fa-building"></span>
        Product Name: 
      </label>

      <br />

      <span class="dash-company-name theme-primary-color">
        {{ ucwords($product->name) }}
      </span>
    </div>

    <div class="col-md-6 theme-card text-center">
      <label for="primary-color" class="theme-secondary-color">
        Image: 
      </label>

      <br />

      <img class="company-logo" src="{{ asset('storage/'.$product->image) }}" alt="">
    </div>


    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        <span class="fa fa-building"></span>
        Description: 
      </label>

      <br />

      <span class="theme-primary-color">
        {!! ucwords($product->description) !!}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        <span class="fa fa"></span>
        Price: 
      </label>
      
      <br />

      <span class="theme-primary-color">
        KSh. {{ $product->price }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
      <span class="fa fa-envelope"></span>
        Status: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ ucwords($product->status->name) }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Tax ID: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ $product->tax_id }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Country: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ $product->country }}
      </span>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Status: 
      </label>

      <br/>

      <span class="theme-primary-color">
        {{ ucwords($product->status->name) }}
      </span>
    </div>
  </div>
</main>
@endsection