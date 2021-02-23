@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($bands as $band)
                <div class="col-md-4">
                    <div class="mb-4 card">
                        <img height="230px" src="{{ $band->picture }}" className="card-img-top">
                        <div class="card-body">
                            <a href="{{ route('bands.show', $band) }}">
                                {{ $band->name }}
                            </a>


                            <div>{{ $band->album->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $bands->links() }}
    </div>
@endsection
