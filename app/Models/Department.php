<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'photo',
        'short_desc',
        'full_desc',
        'banner_pic',
        'facility_pic',
        'facility_pic2',
        'slug',
    ];

    public function getHodAttribute()
    {
        return $this->teamMembers()->where('is_hod', true)->first();
    }

    public function getTrainersAttribute()
    {
        return $this->teamMembers()->where('is_hod', false)->get();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }

    // Automatically generate slug from name when creating or updating
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($department) {
            if (empty($department->slug) && ! empty($department->name)) {
                $department->slug = Str::slug($department->name);
            }
        });
    }
}
