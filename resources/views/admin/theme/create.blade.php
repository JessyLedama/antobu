@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2">
      Themes
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
    <a class="new-btn" href="{{ route('admin.product.index') }}">
      All Themes
    </a>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('admin.theme.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">
        Theme Name
      </label>

      <input name="name" old="name" type="text" class="form-control" id="" placeholder="Enter Theme Name" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Website Icon (Favicon)
      </label>

      <input name="favicon" type="file" class="form-control" id="" required>
    </div>

    <div class="mb-3">
      <label for="primary_color" class="form-label">
        Primary Color
      </label>

      <input name="primary_color" type="text" class="form-control" id="" placeholder="Enter Primary Color" required>
    </div>

    <div class="mb-3">
      <label for="secondary_color" class="form-label">
        Secondary Color
      </label>

      <input name="secondary_color" type="text" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="primary_button" class="form-label">
        Primary Button
      </label>

      <input name="primary_button" type="text" class="form-control" id="" placeholder="Enter Primary Button" required>
    </div>

    <div class="mb-3">
      <label for="secondary_button" class="form-label">
        Secondary Button
      </label>

      <input name="secondary_button" type="text" class="form-control" placeholder="Enter Secondary Button" id="">
    </div>

    <div class="mb-3">
      <label for="title_font" class="form-label">
        Title Font
      </label>

      <input name="title_font" type="text" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="content_font" class="form-label">
        Content Font
      </label>

      <input name="content_font" type="text" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="header_color" class="form-label">
        Header Color
      </label>

      <input name="header_color" type="text" class="form-control" id="">
    </div>

    <div class="mb-3">
      <label for="footer_color" class="form-label">
        Footer Color
      </label>

      <input name="footer_color" type="text" class="form-control" id="">
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection