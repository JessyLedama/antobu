@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Companies
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
          <a href="{{ route('admin.company.index') }}">
            Companies
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          New Company
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.company.index') }}">
      All Companies
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

  <form action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">
        Company Name
      </label>

      <input name="name" type="text" class="form-control" id="" placeholder="Enter Company Name" required>
    </div>

    <div class="mb-3">
      <label for="logo" class="form-label">
        Company Logo
      </label>

      <input name="logo" type="file" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">
        Address
      </label>

      <input name="address" type="text" class="form-control" id="" placeholder="Enter Company Address">
    </div>

    <div class="mb-3">
      <label for="website" class="form-label">
        Website
      </label>

      <input name="website" type="url" class="form-control" id="" placeholder="Enter Company Website">
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">
        Phone
      </label>

      <input name="phone" type="text" class="form-control" id="" placeholder="Enter Company Phone">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">
        Email
      </label>

      <input name="email" type="email" class="form-control" id="" placeholder="Enter Company Email">
    </div>

    <div class="mb-3">
      <label for="tax_id" class="form-label">
        Tax ID
      </label>

      <input name="tax_id" type="text" class="form-control" id="" placeholder="Enter Company Tax ID">
    </div>

    <div class="mb-3">
      <label for="country" class="form-label">
        Country
      </label>

      <select name="country" id="" class="form-control">
        <option value="">
          Select a country
        </option>

        @foreach($countries as $country)
          <option value="{{ $country['name']['common'] }}">
            {{ ucwords($country['name']['common']) }}
          </option>
        @endforeach
      </select>
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection