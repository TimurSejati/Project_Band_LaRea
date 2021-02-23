<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
    @error('thumbnail')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $band->name }}">
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="genre">Choose Genre</label>
    <select name="genre[]" id="genre" class="form-control select2multiple" multiple>
        @foreach ($genres as $genre)
            <option {{ $band->genres()->find($genre->id) ? 'selected' : '' }} value="{{ $genre->id }}">
                {{ $genre->name }}</option>
        @endforeach

    </select>
    @error('genre')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
