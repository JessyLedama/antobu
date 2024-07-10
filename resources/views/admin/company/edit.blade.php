@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

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

        <li class="breadcrumb-item">
          <a href="{{ route('admin.company.show', $company->slug) }}">
            {{ ucwords($company->name) }}
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          Edit Company ({{ $company->name }})
        </li>
      </ol>
    </nav>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.company.xlsx') }}" class="btn btn-sm btn-outline-secondary">
          XLSX
        </a>

        <a href="{{ route('admin.company.csv') }}" class="btn btn-sm btn-outline-secondary">
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
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.company.index') }}">
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

  <form action="{{ route('admin.company.update', $company->slug) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="mb-3 col-8">
        <label for="name" class="form-label theme-secondary-color">
          Company Name
        </label>

        <input name="name" type="text" class="form-control theme-input-form" id="" placeholder="Enter Company Name" value="{{ $company->name }}" required>
      </div>

      <div class="mb-3 col-4">
        <label for="logo" class="form-label theme-secondary-color">
          Company Logo
        </label>

        <input name="logo" type="file" class="form-control theme-input-form" id="">
        <img class="current-img" src="{{ asset('storage/'.$company->logo) }}" alt="">
        <small>
          Current Logo
        </small>
      </div>

      <div class="mb-3 col-4">
        <label for="address" class="form-label theme-secondary-color">
          Address
        </label>

        <input name="address" type="text" class="form-control theme-input-form" value="{{ $company->address }}" id="" placeholder="Enter Company Address">
      </div>

      <div class="mb-3 col-4">
        <label for="phone" class="form-label theme-secondary-color">
          Phone
        </label>

        <input name="phone" type="text" class="form-control theme-input-form" id="" placeholder="Enter Company Phone" value="{{ $company->phone }}">
      </div>

      <div class="mb-3 col-4">
        <label for="country" class="form-label theme-secondary-color">
          Country
        </label>

        <select name="country" id="" class="form-control theme-input-form">
          @if(isset($company->country))
            <option value="{{ $company->country }}">
              {{ ucwords($company->country) }}
            </option>
          @else
            <option value="">
              Select a country
            </option>
          @endif

          @foreach($countries as $country)
            <option value="{{ $country['name']['common'] }}">
              {{ ucwords($country['name']['common']) }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3 col-4" >
        <label for="website" class="form-label theme-secondary-color">
          Website
        </label>

        <input name="website" type="url" class="form-control theme-input-form" id="" placeholder="Enter Company Website" value="{{ $company->website }}">
      </div>

      <div class="mb-3 col-4">
        <label for="email" class="form-label theme-secondary-color">
          Email
        </label>

        <input name="email" type="email" class="form-control theme-input-form" id="" placeholder="Enter Company Email" value="{{ $company->email }}">
      </div>

      <div class="mb-3 col-4">
        <label for="tax_id" class="form-label theme-secondary-color">
          Tax ID
        </label>

        <input name="tax_id" type="text" class="form-control theme-input-form" id="" placeholder="Enter Company Tax ID" value="{{ $company->tax_id }}">
      </div>
    </div>

    <input type="submit" value="Save" class="new-btn theme-primary-btn">
  </form>
</main>
@endsection