<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = ['image', 'title', 'subtitle', 'slogan', 'button_text', 'button_link'];
}
