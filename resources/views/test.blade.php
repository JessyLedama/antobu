@php 
    use App\Services\ThemeService;

    $theme = ThemeService::active();
@endphp

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/theme.php') }}">

@section('content')
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <span class="theme-title">
                    Test
                </span>
            </div>
        </div>
    </div>
</section>

@endsection