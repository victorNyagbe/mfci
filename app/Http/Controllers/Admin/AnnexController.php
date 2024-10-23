<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annex;
use Illuminate\Http\Request;

class AnnexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annexes = Annex::all();
        return view('admin.annexes.index', [
            'annexes' => $annexes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.annexes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'address' => $request->address,
            'contact' => $request->contact
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('annexes', 'public');
            $data['file'] = $filePath;
        }

        Annex::create($data);

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
        $annex = Annex::find($id);
        return view('admin.annexes.edit', [
            'annex' => $annex
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $annex = Annex::find($id);

        $data = [
            'address' => $request->address,
            'contact' => $request->contact
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('annexes', 'public');

            try {
                if ($annex->file)
                    unlink("storage/$annex->file");
            } catch (\Throwable $th) {
                //throw $th;
            }

            $data['file'] = $filePath;
        }

        $annex->update($data);

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annex = Annex::find($id);

        try {
            if ($annex->file)
                unlink("storage/$annex->file");
        } catch (\Throwable $th) {
            //throw $th;
        }

        $annex->delete();
        return back();
    }
}
