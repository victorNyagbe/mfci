<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentFile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = Content::find(1);
        $contentFile = ContentFile::where('content_name', "about-image")->first();
        return view('admin.about', [
            'about' => $about,
            'contentFile' => $contentFile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Content::where('id', $id)->update(['about' => $request->about]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeOrUpdateAboutFile(Request $request, ContentFile $contentFile = null)
    {
        if ($request->hasFile('about-file')) {
            if ($contentFile == null) {
                ContentFile::create([
                    "content_name" => "about-image",
                    "filepath" => $request->file('about-file')->store('content-files', 'public')
                ]);
            } else {
                $contentFile->update([
                    "filepath" => $request->file('about-file')->store('content-files', 'public')
                ]);
            }
        } else {
            return redirect()->back()->withErrors(["error" => "Veuillez renseignerun fichier"]);
        }

        return redirect()->back()->withErrors(['success', "Opération effectuée avec succès"]);
    }
}
