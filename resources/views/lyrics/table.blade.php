@extends('layouts.backend', compact('title'))

@section('content')
    <div id="table-of-lyric" title="{{ $title }}" endpoint="{{ route('lyrics.datatable') }}">

    </div>
@endsection
