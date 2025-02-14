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
        
        <li class="breadcrumb-item active" aria-current="page">
          Companies
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.company.create') }}">
      New Company
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
            #
          </th>

          <th scope="col">
            Logo
          </th>
          
          <th scope="col">
            Name
          </th>
          
          <th scope="col">
            Phone
          </th>
          
          <th scope="col">
            Country
          </th>

          <th scope="col">
            Status
          </th>
          
          <th scope="col">
            Action
          </th>
        </tr>
      </thead>
      @if($companies->count() > 0)
      <tbody>
        @foreach($companies as $key => $company)
          <tr>
            <td>
              {{ $key + 1 }}
            </td>

            <td>
              <img class="product-img" src="{{ asset('storage/'.$company->logo) }}" alt="">
            </td>

            <td class="product-text">
              <span >
                {{ ucfirst($company->name) }}
              </span>
            </td>

            <td>
              {{ $company->phone }}
            </td>

            <td>
              {{ $company->country }}
            </td>

            <td>
              {{ ucwords($company->status->name) }}
            </td>

            <td>
              <a href="{{ route('admin.company.edit', $company->slug) }}">
                <span class="fa fa-pencil"></span>
                Edit
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
      @else
      <div>
        There are no companies. Add some!
      </div>
      @endif
    </table>

    <span class="pagination">
      {{ $companies->links() }}
    </span>
  </div>
</main>
@endsection