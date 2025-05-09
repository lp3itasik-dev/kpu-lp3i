<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CardVote;
use App\Models\Period;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $period = Period::orderByDesc('id')->firstOrFail();

        $cardvote = CardVote::with([
            'user',
            'period',
            'organization',
            'organization.program',
            'organization.program.faculty',
        ])->where([
            'period_id' => $period->id,
            'user_id' => auth()->user()->id
        ])->firstOrFail();

        $candidates = Candidate::with([
            'organization',
            'organization.program',
            'organization.program.faculty',
            'period'
        ])
        ->where([
            'period_id' => $period->id,
            'organization_id' => $cardvote->organization_id
        ])
        ->whereHas('organization', function ($query) {
            $query->whereNotNull('program_id');
        })
        ->get();

        $candidates_non_organization = Candidate::with([
            'organization',
            'organization.program',
            'organization.program.faculty',
            'period'
        ])
        ->where([
            'period_id' => $period->id
        ])
        ->whereHas('organization', function ($query) {
            $query->whereNull('program_id');
        })
        ->get();

        $voting = Voting::with([
            'cardvote',
            'cardvote.period',
            'cardvote.user',
            'cardvote.organization',
            'candidate',
            'candidate.organization',
            'candidate.organization.program',
            'candidate.organization.program.faculty',
        ])->where([
            'card_vote_id' => $cardvote->id,
        ])->get();

        return view('voting')->with([
            'candidates' => $candidates,
            'candidates_non_organization' => $candidates_non_organization,
            'cardvote' => $cardvote,
            'period' => $period,
            'voting' => $voting,
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
        $request->validate([
            'card_vote_id' => 'required|exists:card_votes,id',
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $cardvote = CardVote::findOrFail($request->card_vote_id);
        $candidate = Candidate::findOrFail($request->candidate_id);

        if($candidate->organization->program_id) {
            if($cardvote->period_id == $candidate->period_id) {
                $check_voting = Voting::with([
                    'cardvote',
                    'cardvote.period',
                    'cardvote.user',
                    'cardvote.organization',
                    'candidate',
                    'candidate.organization',
                    'candidate.organization.program',
                    'candidate.organization.program.faculty',
                ])
                ->whereHas('candidate', function ($query) use ($candidate) {
                    $query->where([
                        'organization_id' => $candidate->organization_id,
                        'period_id' => $candidate->period_id,
                    ]);
                })->first();
                if($check_voting){
                    return redirect()->route('voting.index')->with('failed', 'You have already voted for this candidate.');
                } else {
                    Voting::create([
                        'card_vote_id' => $request->card_vote_id,
                        'candidate_id' => $request->candidate_id,
                    ]);
                }
            }
        } else {
            if($cardvote->period_id == $candidate->period_id) {
                $check_voting = Voting::with([
                    'cardvote',
                    'cardvote.period',
                    'cardvote.user',
                    'cardvote.organization',
                    'candidate',
                    'candidate.organization',
                    'candidate.organization.program',
                    'candidate.organization.program.faculty',
                ])
                ->where([
                    'card_vote_id' => $request->card_vote_id,
                ])
                ->whereHas('candidate', function ($query) use ($candidate) {
                    $query->where([
                        'organization_id' => $candidate->organization_id,
                        'period_id' => $candidate->period_id,
                    ]);
                })->first();
                if($check_voting){
                    return redirect()->route('voting.index')->with('failed', 'You have already voted for this candidate.');
                } else {
                    Voting::create([
                        'card_vote_id' => $request->card_vote_id,
                        'candidate_id' => $request->candidate_id,
                    ]);
                }
            }
        }

        return redirect()->route('voting.index')->with('success', 'Your vote has been successfully submitted.');
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
        //
    }
}
