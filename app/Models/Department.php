<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Department extends Model
{
    use BelongsToInstitution, HasFactory, SoftDeletes;

    protected $fillable = [
        'institution_id',
        'name',
        'slug',
        'photo',
        'short_description',
        'full_description',
        'banner_photo',
        'type',
        'is_active',
    ];

    public function hod()
    {
        return $this->belongsToMany(TeamMember::class)
            ->withPivot('role_id', 'custom_title')
            ->whereHas('roles', function ($q) {
                $q->where('name', 'HOD');
            });
    }


    public function trainers()
    {
        return $this->teamMembers()
            ->whereHas('roles', fn ($q) => $q->where('name', 'Trainer'));
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(TeamMember::class, 'department_team_member')
            ->withPivot('role_id', 'custom_title')
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($department) {
            $slug = Str::slug($department->name);

            $count = static::withoutGlobalScopes()
                ->where('institution_id', $department->institution_id)
                ->where('slug', 'LIKE', "{$slug}%")
                ->count();

            $department->slug = $count > 0
                ? "{$slug}-".($count + 1)
                : $slug;
        });
    }
}
