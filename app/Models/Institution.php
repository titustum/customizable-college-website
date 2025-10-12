<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'name',
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
        'x',
        'youtube',
        'latitude',
        'longitude',
    ];

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
