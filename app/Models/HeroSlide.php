<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = ['institution_id', 'image', 'title', 'subtitle', 'slogan', 'button_text', 'button_link'];
}
