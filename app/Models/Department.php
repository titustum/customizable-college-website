<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'short_description',
        'full_description',
        'banner_photo',
        'type',
        'is_active',
        'leader_message',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function hod()
    {
        return $this->belongsToMany(
            TeamMember::class,
            'department_team_member'
        )
            ->withPivot(['role_id', 'custom_title'])
            ->wherePivot('role_id', Role::where('slug', 'hod')->value('id'));
    }

    public function coordinator()
    {
        return $this->belongsToMany(
            TeamMember::class,
            'department_team_member'
        )
            ->withPivot(['role_id', 'custom_title'])
            ->wherePivot('role_id', Role::where('slug', 'coordinator')->value('id'));
    }

    public function coordinators()
    {
        return $this->belongsToMany(TeamMember::class, 'department_team_member')
            ->withPivot(['role_id', 'custom_title'])
            ->whereHas('roles', function ($q) {
                $q->where('slug', 'coordinator');
            });
    }

    public function trainers()
    {
        return $this->teamMembers()
            ->whereHas('roles', fn ($q) => $q->where('slug', 'trainer'));
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teamMembers()
    {
        return $this->belongsToMany(TeamMember::class, 'department_team_member')
            ->withPivot('role_id')
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($department) {
            $slug = Str::slug($department->name);

            $count = static::where('slug', 'LIKE', "{$slug}%")->count();

            $department->slug = $count > 0
                ? "{$slug}-".($count + 1)
                : $slug;
        });
    }
}
