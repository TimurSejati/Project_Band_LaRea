@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('baseScripts')
    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('body')
    <x-navbar />
    <div class="mt-4">
        @yield('content')
    </div>

    <div class="py-5 mt-5 border-top">
        <div class="container">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam repellendus sit rem eos vero quisquam quis
            perferendis sunt sint veritatis saepe consequatur numquam nostrum minus commodi eligendi, dolore ab soluta?
        </div>
    </div>
@endsection
