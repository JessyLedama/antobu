@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
<main>
    @include('admin.sidebar')
    
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
                <a href="{{ route('admin.product.index') }}">
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

        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('ordersChart');

  const ordersChartData = @json($ordersChart);

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ordersChartData.labels,
      datasets: [{
        label: '# of Orders',
        data: ordersChartData.data,
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
