<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Http\Requests\Band\AlbumRequest;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create', [
            'title' => 'New Album',
            'bands' => Band::get(),
            'album' => new Album,
            'submitLabel' => 'Create',
        ]);
    }

    public function store(AlbumRequest $requset)
    {

        $band = Band::find(request('band'));

        Album::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        return back()->with(['success' => 'Album was created into ' . $band->name]);

    }

    public function table()
    {
        return view('albums.table', [
            'albums' => Album::with('band')->paginate(10),
            'title' => 'Album',
        ]);
    }

    public function edit(Album $album)
    {
        return view('albums.edit', [
            'album' => $album,
            'bands' => Band::get(),
            'title' => "Edit album: {$album->name}",
            'submitLabel' => 'Update',

        ]);
    }

    public function update(Album $album, AlbumRequest $requset)
    {

        $band = Band::find(request('band'));

        $album->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        return redirect()->route('albums.table')->with(['success' => 'Album was updated ']);
    }

    public function getAlbumByBandId(Band $band)
    {
        return $band->albums;
    }

    public function destroy(Album $album)
    {
        $album->delete();
    }
}
