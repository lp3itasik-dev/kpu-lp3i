<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Program;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = Organization::with([
            'program'
        ]);

        if ($search) {
            $query->whereHas('program', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $organizations = $query->paginate($entries);

        return view('organizations.index')->with([
            'organizations' => $organizations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('organizations.create')->with([
            'programs' => $programs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean'
        ]);

        Organization::create([
            'program_id' => $request->program_id,
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully');
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
        $programs = Program::all();
        $organization = Organization::with('program')->findOrFail($id);
        return view('organizations.edit')->with([
            'organization' => $organization,
            'programs' => $programs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean'
        ]);

        $organization = Organization::findOrFail($id);
        $organization->update([
            'program_id' => $request->program_id,
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
