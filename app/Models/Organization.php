<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'program_id',
        'name',
        'logo',
        'description',
        'is_active'
    ];

    /**
     * The program that owns the organization.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * The candidates that belong to the organization.
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
