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
        'photo',
        'short_desc',
        'full_desc',
        'banner_pic',
        'facility_pic',
        'facility_pic2',
        'slug',
    ];

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
