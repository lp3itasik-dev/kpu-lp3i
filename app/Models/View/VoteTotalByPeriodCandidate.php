<?php

namespace App\Models\View;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteTotalByPeriodCandidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'period_id',
        'period_name',
        'candidate_id',
        'candidate_name',
        'candidate_logo',
        'candidate_description',
        'candidate_vision',
        'organization_id',
        'organization_name',
        'total',
    ];

    protected $table = 'view_vote_totals_by_period_candidate';
}
