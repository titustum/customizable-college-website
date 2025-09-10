<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlideContent extends Model
{
    protected $fillable = ['image', 'title', 'subtitle', 'slogan', 'button_text', 'button_link'];
}
