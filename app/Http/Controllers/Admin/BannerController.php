<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('banners', 'public');
            $data['file'] = $filePath;
        }

        Banner::create($data);

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
        $banner = Banner::where('id', $id)->first();
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $banner = Banner::where('id', $id)->first();

        if ($banner == null) {
            return redirect()->back()->with("error", "Bannière non disponible!");
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('banners', 'public');
            $data['file'] = $filePath;
        }

        $banner->update($data);

        return redirect()->back()->withErrors(["success" => "Opération effectuée avec succès"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);

        try {
            if ($banner->file)
                unlink("storage/$banner->file");
        } catch (\Throwable $th) {
            //throw $th;
        }

        $banner->delete();
        return back();
    }
}
