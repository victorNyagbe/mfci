<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activities.index', [
            'activities' => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'day' => $request->day,
            'title' => $request->title,
            'date' => $request->date
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('activities', 'public');
            $data['file'] = $filePath;
        }

        Activity::create($data);

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
        $activity = Activity::find($id);
        return view('admin.activities.edit', [
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::find($id);

        $data = [
            'day' => $request->day,
            'title' => $request->title,
            'date' => $request->date
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('activities', 'public');

            try {
                if ($activity->file)
                    unlink("storage/$activity->file");
            } catch (\Throwable $th) {
                //throw $th;
            }

            $data['file'] = $filePath;
        }

        $activity->update($data);

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id);
        try {
            if ($activity->file)
                unlink("storage/$activity->file");
        } catch (\Throwable $th) {
            //throw $th;
        }
        $activity->delete();
        return back();
    }
}
