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
          <a href="{{ route('admin.theme.index') }}">
            Themes
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          {{ $theme->name }}
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.theme.create') }}">
      New
    </a>

    <a class="new-btn" href="{{ route('admin.theme.edit', $theme->slug) }}">
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

  <div class="table-responsive small dash-table">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">
            Favicon
          </th>
          
          <th scope="col">
            Name
          </th>
          
          <th scope="col">
            Status
          </th>
        </tr>
      </thead>

      <tbody>
          <tr>
            <td>
              <img class="product-img" src="{{ asset('storage/'.$theme->favicon) }}" alt="">
            </td>

            <td class="product-text">
              <span >
                {{ ucfirst($theme->name) }}
              </span>
            </td>

            <td>
              {{ ucwords($theme->status->name) }}
            </td>
          </tr>
      </tbody>
    </table>
  </div>

  <div class="row">
    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Primary Color: 
        <span style="color:{{ $theme->primary_color }}">
          {{ $theme->primary_color }}
        </span>

      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Secondary Color: 
        <span style="color:{{ $theme->secondary_color }}">
          {{ $theme->secondary_color }}
        </span>

      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Header Color: 
        <span style="color:{{ $theme->header_color }}">
          {{ $theme->header_color }}
        </span>
      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Footer Color: 
        <span style="color:{{ $theme->footer_color }}">
          {{ $theme->footer_color }}
        </span>
      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Title Font: 
        <span style="color:{{ $theme->primary_color }}">
          {{ $theme->title_font }}
        </span>

      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color">
        Content Font: 
        <span style="color:{{ $theme->primary_color }}">
          {{ $theme->content_font }}
        </span>
      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label class="btn theme-primary-btn" for="primary-color theme-secondary-btn">
        Primary Button
      </label>
    </div>

    <div class="col-md-3 theme-card">
      <label class="btn theme-secondary-btn" for="primary-color theme-secondary-btn">
        Secondary Button 
      </label>
    </div>
  </div>
</main>
@endsection