@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
  <main>
    @include('admin.sidebar')
    <h2>
      Slides
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
              Image
            </th>
            
            <th scope="col">
              Caption
            </th>
          </tr>
        </thead>

        <tbody>
          @foreach($slides as $key => $slide)
            <tr>
              <td>
                {{ $key + 1 }}
              </td>

              <td>
                {{ ucfirst($slide->name) }}
              </td>

              <td>
                <img src="{{ asset('storage/'.$slide->image) }}" alt="">
              </td>

              <td>
                {{ $slide->caption }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection