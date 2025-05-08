<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
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
        'organization_id',
        'name',
        'description',
        'vision',
        'mision',
        'logo',
        'video',
        'is_active',
    ];

    /**
     * The organization that owns the candidate.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function voting()
    {
        return $this->hasMany(Voting::class);
    }
}
