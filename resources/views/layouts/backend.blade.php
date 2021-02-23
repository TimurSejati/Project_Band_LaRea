@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
@endsection

@section('baseScripts')
    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}"></script>
    @stack('scripts')
@endsection

@section('body')
    <div class="py-3 container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-sidebar />
            </div>
            <div class="col-md-9">
                @include('alert')
                @yield('content')
            </div>
        </div>
    </div>
@endsection
