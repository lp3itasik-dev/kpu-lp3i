<?php

namespace App\Http\Controllers;

use App\Models\CardVote;
use App\Models\Period;
use App\Models\Voting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $period = Period::orderByDesc('id')->firstOrFail();

        $cardvotes = CardVote::with([
            'user',
            'period',
            'organization',
            'organization.program',
            'organization.program.faculty',
        ])->where([
            'period_id' => $period->id,
        ])->get()->groupBy('organization_id');

        $voted = Voting::with([
            'cardvote',
            'cardvote.period',
            'cardvote.user',
            'cardvote.organization',
            'candidate',
            'candidate.organization',
            'candidate.organization.program',
            'candidate.organization.program.faculty',
        ])->get();

        $votedGrouped = $voted->groupBy(function ($item) {
            return $item->cardvote->organization_id ?? null;
        });


        return view('dashboard')->with([
            'voted' => $voted,
            'period' => $period,
            'cardvotes' => $cardvotes,
        ]);
    }
}
