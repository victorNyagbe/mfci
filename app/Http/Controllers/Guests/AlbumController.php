<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\File;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(): View
    {
        $albums = Album::orderByDesc('id')->get();
        return view('albums.index', compact('albums'));
    }

    public function show(Album $album): View | RedirectResponse
    {
        $findAlbum = Album::where('id', $album->id)->exists();

        if (!$findAlbum) {
            abort(404);
        }

        $files = File::where('album_id', $album->id)->get();

        return view('albums.show', compact('album', 'files'));
    }
}
