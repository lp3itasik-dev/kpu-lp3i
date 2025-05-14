<?php

namespace App\Http\Controllers;

use App\Models\CardVote;
use App\Models\Period;
use App\Models\View\VoteTotalByPeriodCandidate;
use App\Models\Voting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $period = Period::orderByDesc('id')->firstOrFail();

        $vote_totals_by_period_candidate = VoteTotalByPeriodCandidate::where('period_id', $period->id)->get()->groupBy('organization_id');

        return view('dashboard')->with([
            'vote_totals_by_period_candidate' => $vote_totals_by_period_candidate
        ]);
    }
}
