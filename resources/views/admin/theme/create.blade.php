@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Themes
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
          <a href="{{ route('admin.theme.index') }}">
            Themes
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          Create Theme
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.theme.index') }}">
      All Themes
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

  <form action="{{ route('admin.theme.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="mb-3 col-6">
        <label for="name" class="form-label theme-secondary-color">
          Theme Name
        </label>

        <input name="name" old="name" type="text" class="form-control theme-input-form" id="" placeholder="Theme Name" required>
      </div>

      <div class="mb-3 col-6">
        <label for="favicon" class="form-label theme-secondary-color">
          Website Icon (Favicon)
        </label>

        <input name="favicon" type="file" class="form-control theme-input-form" id="" required>
      </div>

      <div class="col-4">
        <label for="primary_color" class="form-label theme-secondary-color">
          Navigation Brand
        </label>

        <select name="navigation_brand" id="" class="mb-3 col-6 form-control theme-input-form" required>
          <option value="">
            
          </option>

          <option value="name">
            Company Name
          </option>

          <option value="logo">
            Company Logo
          </option>
          
        </select>
      </div>

      <div class="mb-3 col-4">
        <label for="primary_color" class="form-label theme-secondary-color">
          Primary Color
        </label>

        <input name="primary_color" type="text" class="form-control theme-input-form" id="" placeholder="" required>
      </div>

      <div class="mb-3 col-4">
        <label for="secondary_color" class="form-label theme-secondary-color">
          Secondary Color
        </label>

        <input name="secondary_color" type="text" class="form-control theme-input-form" id="" placeholder="">
      </div>

      <div class="mb-3 col-6">
        <label for="primary_button" class="form-label theme-secondary-color">
          Primary Button
        </label>

        <input name="primary_button" type="text" class="form-control theme-input-form" id="" placeholder="" required>
      </div>

      <div class="mb-3 col-6">
        <label for="secondary_button" class="form-label theme-secondary-color">
          Secondary Button
        </label>

        <input name="secondary_button" type="text" class="form-control theme-input-form" placeholder="" id="">
      </div>

      <div class="mb-3 col-3">
        <label for="title_font" class="form-label theme-secondary-color">
          Title Font
        </label>

        <input name="title_font" type="text" class="form-control theme-input-form" id="">
      </div>

      <div class="mb-3 col-3">
        <label for="content_font" class="form-label theme-secondary-color">
          Content Font
        </label>

        <input name="content_font" type="text" class="form-control theme-input-form" id="">
      </div>

      <div class="mb-3 col-3">
        <label for="header_color" class="form-label theme-secondary-color">
          Header Color
        </label>

        <input name="header_color" type="text" class="form-control theme-input-form" id="">
      </div>

      <div class="mb-3 col-3">
        <label for="footer_color" class="form-label theme-secondary-color">
          Footer Color
        </label>

        <input name="footer_color" type="text" class="form-control theme-input-form" id="">
      </div>

    </div>

    <input type="submit" value="Save" class="new-btn theme-primary-btn">
  </form>
</main>
@endsection