@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      New Status
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
    <a class="new-btn" href="{{ route('admin.status.index') }}">
      All Statuses
    </a>
  </div>

  <form action="{{ route('admin.status.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">
        Status Name
      </label>

      <input name="name" type="text" class="form-control" id="" placeholder="Enter Status Name" required>
    </div>

    <input type="submit" value="Save" class="new-btn theme-primary-btn">
  </form>
</main>
@endsection