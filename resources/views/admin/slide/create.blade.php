@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      New Slideshow
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

  <!-- breadcrumbs -->
  <div>
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
          <a href="{{ route('admin.slide.index') }}">
            Slideshows
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          Create Slideshow
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.slide.index') }}">
      All Slides
    </a>
  </div>

  <form action="{{ route('admin.slide.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Slideshow Title
      </label>

      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Example Headline" required>
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

    <input type="submit" value="Save" class="btn theme-primary-btn">
  </form>
</main>
@endsection