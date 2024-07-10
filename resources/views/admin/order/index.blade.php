@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2 theme-primary-color">
      Orders
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
          <a href="{{ route('dashboard') }}" class="theme-primary-color">
            Dashboard
          </a>
        </li>
        
        <li class="breadcrumb-item theme-secondary-color" aria-current="page">
          Orders
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.order.create') }}">
      New Order
    </a>
  </div>

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
        No orders to show at this time
      </div>
    @endif
  </div>
</main>
@endsection