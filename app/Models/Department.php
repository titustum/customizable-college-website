<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

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

    public function hods()
    {
        return $this->teamMembers()
            ->whereHas('roles', fn ($q) => $q->where('name', 'HOD'));
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
        return $this->belongsToMany(TeamMember::class)
            ->withPivot('role_id', 'custom_title')
            ->withTimestamps();
    }

    // Automatically generate slug from name when creating or updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($department) {
            $department->slug = Str::slug($department->name);
        });
    }
}
