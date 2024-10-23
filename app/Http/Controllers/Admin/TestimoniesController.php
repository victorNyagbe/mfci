<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimony;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimoniesController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::orderByDesc('id')->get();

        return view('admin.testimonies', compact("testimonies"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "youtube_url" => "required|url"
        ], [
            "youtube_url.required" => "Le lien est obligatoire",
            "youtube_url.url" => "Le lien doit être une URL valide"
        ]);

        Testimony::create([
            'url' => Str::substr($request->youtube_url, 17)
        ]);

        return redirect()->back()->with("success", "Vidéo ajoutée avec succès");
    }
}
