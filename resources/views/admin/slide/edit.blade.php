@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Edit Slideshow
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
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.slide.index') }}">
      All Slides
    </a>
  </div>
  
  <form action="{{ route('admin.slide.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="slideshow-title" class="form-label theme-primary-color">
        Slideshow Title
      </label>

      <input name="name" type="text" class="form-control theme-secondary-color" id="title" placeholder="Example Headline" value="{{ $slide->name }}" required>
    </div>

    <div class="mb-3">
      <label for="slideshow-image" class="form-label theme-primary-color">
        Slideshow Image
      </label>

      <input name="image" type="file" class="form-control" id="slideshowImage" required>
      <img src="{{ asset('storage/'.$slide->image) }}" class="current-img" alt="">
      <small class="theme-secondary-color">
        Current image
      </small>
    </div>

    <div class="mb-3">
      <label for="caption" class="form-label theme-primary-color">
        Caption
      </label>

      <textarea name="caption" class="form-control theme-secondary-color" id="caption" rows="3" required>{{ $slide->caption }}</textarea>
    </div>

    <input type="submit" value="Update" class="btn theme-primary-btn">
  </form>
</main>
@endsection