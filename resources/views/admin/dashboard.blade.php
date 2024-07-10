@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Dashboard
    </h1>
  </div>
  
  <!-- breadcrumbs -->
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item active" aria-current="page">
          Dashboard
        </li>
      </ol>
    </nav>
  </div>
    
  <div class="container">
      <div class="row  row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('admin.order.index') }}">
                  <h5 class="card-title">
                      Orders

                      <span class="float-right">
                          {{ $counts->orders_count }}
                      </span>
                  </h5>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('product.index') }}">
                  <h5 class="card-title">
                      Products

                      <span class="float-right">
                          {{ $counts->products_count }}
                      </span>
                  </h5>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('admin.productCategory.index') }}">
                  <h5 class="card-title">
                      Product Categories

                      <span class="float-right">
                          {{ $counts->product_categories_count }}
                      </span>
                  </h5>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                  Product Categories

                  <span class="float-right">
                      {{ $counts->product_categories_count }}
                  </span>
              </h5>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                  Product Categories

                  <span class="float-right">
                      {{ $counts->product_categories_count }}
                  </span>
              </h5>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                  Product Categories

                  <span class="float-right">
                      {{ $counts->product_categories_count }}
                  </span>
              </h5>
            </div>
          </div>
        </div>

        <canvas class="chart" id="ordersChart"></canvas>

        <canvas class="chart" id="productsChart"></canvas>
      </div>
  </div>
</main>

<script src="{{ asset('chart.js/package/dist/chart.umd.js') }}"></script>

<script>
  const ctx = document.getElementById('ordersChart');

  const ordersChartDatas = @json($ordersChart);
  const ordersChartData = JSON.parse(ordersChartDatas);
  const labels = ordersChartData.labels;
  const data = ordersChartData.data;

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: '# of Orders',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script>
  const ctv = document.getElementById('productsChart');

  const productsChartDatas = @json($productsChart);
  const productsChartData = JSON.parse(productsChartDatas);
  const label = productsChartData.labels;
  const datas = productsChartData.data;

  new Chart(ctv, {
    type: 'line',
    data: {
      labels: label,
      datasets: [{
        label: '# of Products',
        data: datas,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection
