<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('faculty')->get();
        return view('programs.index')->with([
            'programs' => $programs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('programs.create')->with([
            'faculties' => $faculties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'name' => 'required|string|max:255',
            'head' => 'required|string|max:255',
            'is_active' => 'required|boolean'
        ]);

        Program::create([
            'faculty_id' => $request->faculty_id,
            'name' => $request->name,
            'head' => $request->head,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('programs.index')->with('success', 'Program created successfully');
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
        $faculties = Faculty::all();
        $program = Program::with('faculty')->findOrFail($id);
        return view('programs.edit')->with([
            'program' => $program,
            'faculties' => $faculties
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'name' => 'required|string|max:255',
            'head' => 'required|string|max:255',
            'is_active' => 'required|boolean'
        ]);

        $program = Program::findOrFail($id);
        $program->update([
            'faculty_id' => $request->faculty_id,
            'name' => $request->name,
            'head' => $request->head,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('programs.index')->with('success', 'Program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully');
    }
}
