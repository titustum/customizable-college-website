<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'name',
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
    ];
}
