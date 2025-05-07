<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'faculty_id',
        'name',
        'head',
        'is_active'
    ];

    /**
     * The faculty that owns the program.
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * The courses that belong to the program.
     */
    public function organization()
    {
        return $this->hasMany(Organization::class);
    }
}
