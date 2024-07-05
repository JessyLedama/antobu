@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('content')
<section class="container">
    <div class="row auth-form">
        <div class="mt-3 mb-3 col-9 offset-4">
            <livewire:pages.auth.register/>
        </div>
    </div>
</section>
@endsection