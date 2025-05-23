<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateDetail;
use Illuminate\Http\Request;

class CandidateDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = Candidate::all();
        return view('candidatedetails.create')->with([
            'candidates' => $candidates,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        CandidateDetail::create([
            'candidate_id' => $request->candidate_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate detail created successfully.');
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
        $candidates = Candidate::all();
        $candidatedetail = CandidateDetail::findOrFail($id);
        return view('candidatedetails.edit')->with([
            'candidatedetail' => $candidatedetail,
            'candidates' => $candidates,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $candidatedetail = CandidateDetail::findOrFail($id);
        $candidatedetail->update([
            'candidate_id' => $request->candidate_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidatedetail = CandidateDetail::findOrFail($id);
        $candidatedetail->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate detail deleted successfully.');
    }
}
