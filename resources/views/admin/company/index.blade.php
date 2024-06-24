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