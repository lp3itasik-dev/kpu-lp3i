<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'dateofvote',
    ];

    /**
     * The programs that belong to the faculty.
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function cardvotes()
    {
        return $this->hasMany(CardVote::class);
    }
}
