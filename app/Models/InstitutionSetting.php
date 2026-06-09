<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'institution_settings';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'logo',
        'principal_name',
        'principal_photo',
        'welcome_message',
        'about_us',
        'primary_color',
        'primary_font',
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
}
