@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')


<main>
  @include('admin.sidebar')
  <h2>
    New Slideshow
  </h2>

  <form action="{{ route('admin.slide.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Slideshow Title
      </label>

      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Example Headline" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">
        Slideshow Image
      </label>

      <input name="image" type="file" class="form-control" id="exampleFormControlInput1" required>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">
        Caption
      </label>

      <textarea name="caption" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>

    <input type="submit" value="Save">
  </form>
</main>
@endsection