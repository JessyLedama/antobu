@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Settings
    </h1>
  </div>
  
    
    <div class="container">
        <div class="row  row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('admin.order.index') }}">
                    <h5 class="card-title">
                        Companies

                        <span class="float-right">
                            {{ $counts->companies_count }}
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
                        Users

                        <span class="float-right">
                            {{ $counts->users_count }}
                        </span>
                    </h5>
                </a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('admin.theme.index') }}">
                    <h5 class="card-title">
                        Theme
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('usersChart');

  const usersChartDatas = @json($usersChart);
  const usersChartData = JSON.parse(usersChartDatas);
  const labels = usersChartData.labels;
  const data = usersChartData.data;

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: '# of Users',
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
  const ctv = document.getElementById('companiesChart');

  const companiesChartDatas = @json($companiesChart);
  const companiesChartData = JSON.parse(companiesChartDatas);
  const label = companiesChartData.labels;
  const datas = companiesChartData.data;

  new Chart(ctv, {
    type: 'line',
    data: {
      labels: label,
      datasets: [{
        label: '# of Companies',
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
