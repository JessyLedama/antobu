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
          <a href="{{ route('admin.company.index') }}">
            Companies
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          {{ ucwords($company->name) }}
        </li>
      </ol>
    </nav>
    
    <!-- export data -->
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
    <a class="new-btn" href="{{ route('admin.company.create') }}">
      New
    </a>

    <a class="new-btn" href="{{ route('admin.company.edit', $company->slug) }}">
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
        Company Name: 
      </label>

      <br />

      <span class="dash-company-name theme-primary-color">
        {{ ucwords($company->name) }}
      </span>
    </div>

    <div class="col-md-6 theme-card text-center">
      <label for="primary-color" class="theme-secondary-color">
        Logo: 
      </label>

      <br />

      <img class="company-logo" src="{{ asset('storage/'.$company->logo) }}" alt="">
    </div>


    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        <span class="fa fa-building"></span>
        Physical Address: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ ucwords($company->address) }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        <span class="fa fa-phone"></span>
        Phone Number: 
      </label>
      
      <br />

      <span class="theme-primary-color">
        {{ $company->phone }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
      <span class="fa fa-envelope"></span>
        Email: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ $company->email }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Tax ID: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ $company->tax_id }}
      </span>
    </div>

    <div class="col-md-4 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Country: 
      </label>

      <br />

      <span class="theme-primary-color">
        {{ $company->country }}
      </span>
    </div>

    <div class="col-md-3 theme-card">
      <label for="primary-color" class="theme-secondary-color">
        Status: 
      </label>

      <br/>

      <span class="theme-primary-color">
        {{ ucwords($company->status->name) }}
      </span>
    </div>
  </div>
</main>
@endsection