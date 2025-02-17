@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Roles
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
          <a href="{{ route('dashboard') }}">
            Dashboard
          </a>
        </li>

        <li class="breadcrumb-item">
          <a href="{{ route('admin.settings') }}">
            Settings
          </a>
        </li>
        
        <li class="breadcrumb-item active" aria-current="page">
          Roles
        </li>
      </ol>
    </nav>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.role.create') }}">
      New Role
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
    @if($roles->count() > 0)
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
              Status
            </th>

            <th scope="col">
              Action
            </th>
          </tr>
        </thead>

        <tbody>
          @foreach($roles as $key => $role)
            <tr>
              <td>
                {{ $key + 1 }}
              </td>

              <td class="product-text">
                <a href="{{ route('admin.role.show', $role->slug) }}">
                  <span >
                    {{ ucfirst($role->name) }}
                  </span>
                </a>
              </td>

              <td>
                {{ ucwords($role->status->name) }}
              </td>

              <td>
                <a href="{{ route('admin.role.edit', $role->slug) }}">
                  <span class="fa fa-pencil"></span>
                  Edit
                </a>

                @if($role->status->name == 'inactive')
                  <a href="{{ route('admin.role.activate', $role->slug) }}" class="btn theme-primary-btn">
                    <!-- <span class="fa fa-pencil"></span> -->
                    Activate
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="no-orders">
        There are no roles. Add some!
      </div>
    @endif

    <span class="pagination">
      {{ $roles->links() }}
    </span>
  </div>
</main>
@endsection