<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\File;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('admin.medias.index', [
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title
        ];

        $album = Album::create($data);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                $filePath = $file->store('albums', 'public');

                $image_file = [
                    'album_id' => $album->id,
                    'file' => $filePath,
                    'type' => $file->getMimeType(),
                ];

                File::create($image_file);
            }


        }

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::find($id);
        return view('admin.medias.edit', [
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'title' => $request->title
        ];

        $album = Album::find($id);
        $album->update($data);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                $filePath = $file->store('albums', 'public');

                $image_file = [
                    'album_id' => $id,
                    'file' => $filePath,
                    'type' => $file->getMimeType(),
                ];

                File::create($image_file);
            }
        }

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = Album::find($id);

        $files = File::where('album_id', $id)->get();

        foreach ($files as $file) {
            File::where('id', $file->id)->delete();
            try {
                if ($file->file)
                    unlink("storage/$file->file");
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        $media->delete();
        return back();
    }

    public function destroyFile(string $id)
    {
        $file = File::find($id);

        try {
            if ($file->file)
                unlink("storage/$file->file");
        } catch (\Throwable $th) {
            //throw $th;
        }

        $file->delete();

        return back();
    }
}
