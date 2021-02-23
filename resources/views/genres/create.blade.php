@extends('layouts.backend', ['title' => $title])


@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('genres.create') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">

                    @error('name')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
