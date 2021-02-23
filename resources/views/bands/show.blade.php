@extends('layouts.app')

@section('content')
    <div class="container">
        <img height="550px" style="object-fit: cover; object-position: top" src="{{ $band->picture }}"
            alt="{{ $band->name }}" class="mb-4 w-100">

        <h3>{{ $band->name }}</h3>

        <div class="mb-4">
            @foreach ($band->genres as $genre)
                <a href="{{ route('genres.show', $genre) }}" class="text-secondary">{{ $genre->name }}</a>
            @endforeach
        </div>


        @foreach ($albums as $album)
            @if ($album->lyrics_count)
                <div class="mb-3 card">
                    <div class="card-header">
                        {{ $album->name }} - {{ $album->year }}
                    </div>
                    <div class="card-body">
                        @foreach ($album->lyrics as $lyric)
                            <a href="{{ route('lyrics.show', [$lyric->band, $lyric]) }}"
                                class="d-block">{{ $lyric->title }}</a>
                        @endforeach


                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
