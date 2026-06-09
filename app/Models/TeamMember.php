<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'phone',
        'name',
        'photo',
        'is_active',
    ];

    public function assignmentFor($departmentId)
    {
        return $this->assignments
            ->firstWhere('department_id', $departmentId);
    }

    public function assignments()
    {
        return $this->hasMany(DepartmentAssignment::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_team_member')
            ->withPivot('role_id')
            ->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'department_team_member')
            ->withPivot(['department_id'])
            ->withTimestamps();
    }

    public function scopeHods($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('name', 'HOD');
        });
    }

    public function scopeSectionLeaders($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('name', 'HOS');
        });
    }
}
