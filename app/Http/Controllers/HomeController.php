<?php

namespace App\Http\Controllers;

use App\Models\Band;

class HomeController extends Controller
{

    public function __invoke()
    {
        $bands = Band::with('album')->latest()->paginate(3);
        return view('home', compact('bands'));
    }
}
