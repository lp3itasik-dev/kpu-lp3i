<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardVote extends Model
{
    /** @use HasFactory<\Database\Factories\CardVoteFactory> */
    use HasFactory;

    protected $fillable = [
        'period_id',
        'user_id',
        'organization_id',
    ];

    /**
     * The user that owns the card vote.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The period that owns the card vote.
     */
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    /**
     * The organization that owns the card vote.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function voting()
    {
        return $this->hasMany(Voting::class);
    }
}
