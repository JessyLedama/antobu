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

  <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.newsletter.create') }}">
      New
    </a>
  </div>

  <div class="table-responsive small dash-table">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">
            #
          </th>

          <th scope="col">
            Image
          </th>
          
          <th scope="col">
            Title
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($newsletters as $key => $newsletter)
          <tr>
            <td>
              {{ $key + 1 }}
            </td>
            
            <td>
              <img class="newsletter-img" src="{{ asset('storage/'.$newsletter->cover) }}" alt="">
            </td>

            <td class="newsletter-text">
              <a href="{{ route('newsletter.show', $newsletter->slug) }}">
                <span >
                  {{ ucfirst($newsletter->name) }}
                </span>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <span class="pagination">
      {{ $newsletters->links() }}
    </span>
  </div>
</main>
@endsection