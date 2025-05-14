<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateDetail;
use App\Models\Organization;
use App\Models\Period;
use Illuminate\Http\Request;

class CandidateController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $candidates = Candidate::with( [
            'organization',
            'organization.program',
            'organization.program.faculty',
            'period'
        ] )->get();
        return view( 'candidates.index' )->with( [
            'candidates' => $candidates,
        ] );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $organizations = Organization::all();
        $periods = Period::all();
        return view( 'candidates.create' )->with( [
            'organizations' => $organizations,
            'periods' => $periods,
        ] );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $request->validate( [
            'period_id' => 'required|exists:periods,id',
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mision' => 'nullable|string',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
            'video' => 'nullable|string',
        ] );

        $logoPath = null;

        if ( $request->hasFile( 'logo' ) ) {
            $logoPath = $request->file( 'logo' )->store( 'uploads/logos', 'public' );
        }

        Candidate::create( [
            'period_id' => $request->period_id,
            'organization_id' => $request->organization_id,
            'name' => $request->name,
            'description' => $request->description,
            'vision' => $request->vision,
            'mision' => $request->mision,
            'logo' => $logoPath,
            'video' => $request->video,
            'is_active' => $request->is_active,
        ] );

        return redirect()->route( 'candidates.index' )->with( 'success', 'Candidate created successfully.' );
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $candidate = Candidate::with( 'organization' )->findOrFail( $id );
        $candidatedetails = CandidateDetail::where( 'candidate_id', $id )->get();
        return view( 'candidates.show' )->with( [
            'candidate' => $candidate,
            'candidatedetails' => $candidatedetails,
        ] );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $candidate = Candidate::with( 'organization' )->findOrFail( $id );
        $organizations = Organization::all();
        $periods = Period::all();
        return view( 'candidates.edit' )->with( [
            'candidate' => $candidate,
            'periods' => $periods,
            'organizations' => $organizations,
        ] );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $request->validate( [
            'period_id' => 'required|exists:periods,id',
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mision' => 'nullable|string',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
            'video' => 'nullable|string',
        ] );

        $candidate = Candidate::findOrFail( $id );

        $logoPath = $candidate->logo;

        if ( $request->hasFile( 'logo' ) ) {
            $logoPath = $request->file( 'logo' )->store( 'uploads/logos', 'public' );
        }

        $candidate->update( [
            'period_id' => $request->period_id,
            'organization_id' => $request->organization_id,
            'name' => $request->name,
            'description' => $request->description,
            'vision' => $request->vision,
            'mision' => $request->mision,
            'logo' => $logoPath,
            'video' => $request->video,
            'is_active' => $request->is_active,
        ] );

        return redirect()->route( 'candidates.index' )->with( 'success', 'Candidate updated successfully.' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $candidate = Candidate::findOrFail( $id );
        $candidate->delete();

        return redirect()->route( 'candidates.index' )->with( 'success', 'Candidate deleted successfully.' );
    }
}
