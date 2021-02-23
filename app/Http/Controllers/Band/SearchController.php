<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Lyric;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $keyword = $request->keyword;
        if (!request('keyword')) {
            return redirect('/');
        } else {
            $lyrics = Lyric::where('title', 'like', "%{$keyword}%")
                ->orWhereHas('band', function ($q) use ($keyword) {
                    return $q->where('name', 'like', "%{$keyword}%");
                })
                ->orWhereHas('album', function ($q) use ($keyword) {
                    return $q->where('name', 'like', "%{$keyword}%");
                })
                ->paginate(2);
        }

        return view('search', [
            'lyrics' => $lyrics,
            'keyword' => $keyword,
        ]);
    }
}
