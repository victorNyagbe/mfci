<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('members', 'public');
            $data['file'] = $filePath;
        }

        Member::create($data);

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
        $member = Member::find($id);
        return view('admin.members.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::find($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('members', 'public');

            try {
                if ($member->file)
                    unlink("storage/$member->file");
            } catch (\Throwable $th) {
                //throw $th;
            }

            $data['file'] = $filePath;
        }

        $member->update($data);

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);

        try {
            if ($member->file)
                unlink("storage/$member->file");
        } catch (\Throwable $th) {
            //throw $th;
        }

        $member->delete();
        return back();
    }
}
