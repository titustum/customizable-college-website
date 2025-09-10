<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    public $timestamps = false; // We’re using `visited_at` instead of created_at

    protected $fillable = [
        'url',
        'full_url',
        'referer',
        'ip',
        'user_agent',
        'visited_at',
    ];
}
