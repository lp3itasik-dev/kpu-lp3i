<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    /** @use HasFactory<\Database\Factories\VotingFactory> */
    use HasFactory;

    protected $fillable = [
        'card_vote_id',
        'candidate_id',
    ];

    public function cardvote()
    {
        return $this->belongsTo(CardVote::class, 'card_vote_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
