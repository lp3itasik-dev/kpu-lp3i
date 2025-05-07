<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Organization;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::with('organization')->get();
        return view('candidates.index')->with([
            'candidates' => $candidates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('candidates.create')->with([
            'organizations' => $organizations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mision' => 'nullable|string',
            'logo' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        Candidate::create([
            'organization_id' => $request->organization_id,
            'name' => $request->name,
            'description' => $request->description,
            'vision' => $request->vision,
            'mision' => $request->mision,
            'logo' => $request->logo,
            'video' => $request->video,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
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
        $candidate = Candidate::with('organization')->findOrFail($id);
        $organizations = Organization::all();
        return view('candidates.edit')->with([
            'candidate' => $candidate,
            'organizations' => $organizations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mision' => 'nullable|string',
            'logo' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        $candidate = Candidate::findOrFail($id);
        $candidate->update([
            'organization_id' => $request->organization_id,
            'name' => $request->name,
            'description' => $request->description,
            'vision' => $request->vision,
            'mision' => $request->mision,
            'logo' => $request->logo,
            'video' => $request->video,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
