<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'role_id',
        'section_assigned',
        'email',
        'name',
        'photo',
        'qualification',
        'graduation_year',
    ];

    protected $casts = [
        'graduation_year' => 'integer',
    ];

    // years of experience = current year - graduation year
    public function getYearsOfExperienceAttribute()
    {
        return now()->year - $this->graduation_year;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
