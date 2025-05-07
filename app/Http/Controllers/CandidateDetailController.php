<?php

namespace App\Http\Controllers;

use App\Models\CandidateDetail;
use Illuminate\Http\Request;

class CandidateDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatedetails = CandidateDetail::all();
        return view('candidatedetails.index')->with([
            'candidatedetails' => $candidatedetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidatedetail = CandidateDetail::findOrFail($id);
        $candidatedetail->delete();
        return redirect()->route('candidatedetails.index')->with('success', 'Candidate detail deleted successfully.');
    }
}
