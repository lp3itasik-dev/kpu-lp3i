<?php

namespace App\Http\Controllers;

use App\Models\CardVote;
use App\Models\Period;
use App\Models\View\VoteTotalByPeriodCandidate;
use App\Models\Voting;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        $period = Period::orderByDesc( 'id' )->firstOrFail();

        $vote_totals_by_period_candidate = VoteTotalByPeriodCandidate::where( 'period_id', $period->id )->get()->groupBy( 'organization_id' );

        return view( 'dashboard' )->with( [
            'vote_totals_by_period_candidate' => $vote_totals_by_period_candidate
        ] );
    }

    public function realcount() {
        return view( 'realcount' );
    }

    public function api() {
        $period = Period::orderByDesc( 'id' )->firstOrFail();

        $vote_totals_by_period_candidate = VoteTotalByPeriodCandidate::where( 'period_id', $period->id )->get()->groupBy( 'organization_id' );

        return response()->json( [
            'vote_totals_by_period_candidate' => $vote_totals_by_period_candidate
        ] );
    }

    public function apicardvote( $period_id, $organization_id = null ) {
        if ( $organization_id ) {
            $totalPemilih = CardVote::where( [
                'period_id' => $period_id,
                'organization_id' => $organization_id,
            ] )->count();
        } else {
            $totalPemilih = CardVote::where( [
                'period_id' => $period_id,
            ] )->count();
        }

        return response()->json( [
            'totalPemilih' => $totalPemilih
        ] );
    }
}
