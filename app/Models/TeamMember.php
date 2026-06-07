<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use BelongsToInstitution, HasFactory, SoftDeletes;

    protected $fillable = [
        'institution_id',
        'email',
        'phone',
        'name',
        'photo',
        'is_active',
    ];




    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_team_member')
            ->withPivot('role_id', 'custom_title')
            ->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'department_team_member')
            ->withPivot('department_id', 'custom_title')
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
