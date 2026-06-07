<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'principal_name',
        'principal_photo',
        'welcome_message',
        'about_us',         // new
        'primary_color',    // new
        'primary_font',    // new
        'motto',
        'vision',
        'mission',
        'phone',
        'email',
        'facebook',
        'tiktok',
        'twitter',
        'youtube',
        'latitude',
        'longitude',
        'address',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getPrimaryColorRgbAttribute()
    {
        return $this->hex2rgb($this->primary_color);
    }

    private function hex2rgb($hex)
    {
        $hex = str_replace('#', '', $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(str_repeat($hex[0], 2));
            $g = hexdec(str_repeat($hex[1], 2));
            $b = hexdec(str_repeat($hex[2], 2));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return "$r, $g, $b";
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function newsCategories()
    {
        return $this->hasMany(NewsCategory::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function pageVisits()
    {
        return $this->hasMany(PageVisit::class);
    }
}
