@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


<main>
  @include('admin.sidebar')
  <h2>
    Orders
  </h2>

  <!-- <div class="btn-container">
    <a class="new-btn" href="{{ route('admin.product.create') }}">
      New Product
    </a>
  </div> -->

  <div class="table-responsive small dash-table">
    @if($orders->count() > 0)
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">
              # Order No.
            </th>
            
            <th scope="col">
              Cutomer
            </th>
            
            <th scope="col">
              Order Total
            </th>
          </tr>
        </thead>

        <tbody>
          @foreach($orders as $key => $order)
            <tr>
              <td>
                {{ $key + 1 }}
              </td>

              <td class="product-text">
                <span >
                  {{ ucfirst($order->user->name) }}
                </span>
              </td>

              <td>
                {{ $order->total }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="no-orders">
        No orders to at this time
      </div>
    @endif
  </div>
</main>
@endsection