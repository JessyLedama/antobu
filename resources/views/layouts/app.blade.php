@php 
    $cartCount = \App\Services\CartService::getCartCount();
    $company = \App\Services\CompanyService::company();
    $theme = \App\Services\ThemeService::active();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if(!$theme == null)
            <link rel="icon" href="{{ asset('storage/'.$theme->favicon) }}" type="image/x-icon">
        @endif
        
        @if(!$company == null)
            <title>
                {{ ucwords($company->name) }}
            </title>
        @else
            <title>
                {{ env('APP_NAME') }}
            </title>
        @endif

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/brands.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/solid.css') }}">

        <!-- Bootstrap icons -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous"> -->

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->

        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
        
        <!-- Theme styles -->
        @if(!$theme == null)
            <style>
                .theme-navigation-bg{
                    background-color:{{ $theme->header_color }} !important;
                }

                .theme-footer-bg{
                    background-color:{{ $theme->footer_color }} !important;
                }

                .theme-title{
                    color:{{ $theme->primary_color }} !important;
                }

                .theme-primary-btn{
                    background-color:{{ $theme->primary_color }} !important;
                }

                .theme-primary-btn:hover{
                    background-color:{{ $theme->secondary_color }} !important;
                    border:1px solid {{ $theme->primary_color }};
                }

                .theme-primary-color{
                    color:{{ $theme->primary_color }} !important;
                }

                .theme-secondary-color{
                    color:{{ $theme->secondary_color }} !important;
                }
            </style>
        @endif
    </head>

    <body>
        @include('layouts.navigation')
        @yield('content')
    </body>

    <footer class="theme-footer-container">
        @include('layouts.footer')

        <script src="{{ asset('js/color-modes.js') }}"></script>

        <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    </footer>
</html>