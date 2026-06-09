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
        return $this->belongsToMany(TeamMember::class)
            ->withPivot('role_id', 'custom_title')
            ->whereHas('roles', function ($q) {
                $q->where('name', 'HOD');
            });
    }

    public function hos()
    {
        return $this->belongsToMany(TeamMember::class, 'department_team_member')
            ->withPivot(['role_id', 'custom_title'])
            ->whereHas('roles', function ($q) {
                $q->whereIn('name', ['HOS', 'Section Head']);
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

            $count = static::where('slug', 'LIKE', "{$slug}%")->count();

            $department->slug = $count > 0
                ? "{$slug}-".($count + 1)
                : $slug;
        });
    }
}
