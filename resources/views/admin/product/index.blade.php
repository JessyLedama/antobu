@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


<main>
  @include('admin.sidebar')
  <h2>
    Products
  </h2>
  <div class="table-responsive small">
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
            Price
          </th>
          
          <th scope="col">
            Image
          </th>
          
          <th scope="col">
            Owner
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($products as $key => $product)
          <tr>
            <td>
              {{ $key + 1 }}
            </td>

            <td>
              {{ ucfirst($product->name) }}
            </td>

            <td>
              {{ $product->price }}
            </td>

            <td>
              {{ $product->image }}
            </td>
            <td>
              {{ $product->user->name }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection