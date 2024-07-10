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
    
    <div class="row">
      <div class="mb-3 col-8">
        <label for="name" class="form-label theme-secondary-color">
          Slideshow Title
        </label>

        <input name="name" type="text" class="form-control theme-input-form" id="name" placeholder="Example Headline" required>
      </div>

      <div class="mb-3 col-4">
        <label for="image" class="form-label theme-secondary-color">
          Slideshow Image
        </label>

        <input name="image" type="file" class="form-control theme-input-form" id="image" required>
      </div>

      <div class="mb-3 col-12">
        <label for="caption" class="form-label theme-secondary-color">
          Caption
        </label>

        <textarea name="caption" class="form-control theme-input-form" id="caption" rows="3" required></textarea>
      </div>
    </div>

    <input type="submit" value="Save" class="btn theme-primary-btn">
  </form>
</main>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
	
  ClassicEditor
        .create( document.querySelector( '#caption' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection