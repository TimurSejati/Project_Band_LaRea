@extends('layouts.backend')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });

    </script>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">Edit Band : {{ $band->name }}</div>
        <div class="card-body">
            <form action="{{ route('bands.edit', $band) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('bands.partials.form-control')
            </form>
        </div>
    </div>
@endsection
