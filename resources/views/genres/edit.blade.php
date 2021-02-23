@extends('layouts.backend', ['title' => $title])


@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('genres.edit', $genre) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $genre->name }}" id="name"
                        class="form-control">

                    @error('name')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
