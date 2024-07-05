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
              <a href="{{ route('admin.company.index') }}">
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
                      Themes

                      <span class="float-right">
                          {{ $counts->themes_count }}
                      </span>
                  </h5>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('admin.slide.index') }}">
                <h5 class="card-title">
                    Slideshows

                    <span class="float-right">
                        {{ $counts->slideshows_count }}
                    </span>
                </h5>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('admin.status.index') }}">
                <h5 class="card-title">
                    Status

                    <span class="float-right">
                        {{ $counts->statuses_count }}
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
      </div>
    </div>
  </main>
@endsection
