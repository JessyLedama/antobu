@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
  <main>
    @include('admin.sidebar')
    <h2>
      Product Categories
    </h2>

    <div class="btn-container">
      <a class="new-btn" href="{{ route('admin.productCategory.create') }}">
        New Category
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
              Name
            </th>
            
            <th scope="col">
              No. of Products
            </th>
          </tr>
        </thead>

        <tbody>
          @foreach($categories as $key => $category)
            <tr>
              <td>
                {{ $key + 1 }}
              </td>

              <td>
                {{ ucfirst($category->name) }}
              </td>

              <td>
                {{ $category->products->count() }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>
@endsection