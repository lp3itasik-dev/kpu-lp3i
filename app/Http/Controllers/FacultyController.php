<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = Faculty::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $faculties = $query->paginate($entries);

        return view('faculties.index')->with([
            'faculties' => $faculties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dean' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        Faculty::create([
            'name' => $request->name,
            'dean' => $request->dean,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('faculties.index')->with('success', 'Faculty created successfully.');
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
        $faculty = Faculty::findOrFail($id);
        return view('faculties.edit')->with([
            'faculty' => $faculty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dean' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $faculty = Faculty::findOrFail($id);
        $faculty->update([
            'name' => $request->name,
            'dean' => $request->dean,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
