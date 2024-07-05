@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Newsletters
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
          <a href="{{ route('admin.newsletter.index') }}">
            Newsletters
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          Create New
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.newsletter.index') }}">
      All Newsletters
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

  <form action="{{ route('admin.newsletter.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">
        Newsletter Title
      </label>

      <input name="name" type="text" class="form-control" id="" placeholder="Enter Title" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Cover Image
      </label>

      <input name="cover" type="file" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="content" class="form-label">
        Content
      </label>

      <textarea id="content" name="content" type="text" class="form-control newsletter-content" placeholder="Type your content here..." required></textarea>
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
	
  ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection