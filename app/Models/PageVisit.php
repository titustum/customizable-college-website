<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    public $timestamps = false; // We’re using `visited_at` instead of created_at

    protected $fillable = [
        'institution_id',
        'url',
        'full_url',
        'referer',
        'ip',
        'user_agent',
        'visited_at',
    ];

    // casts
    protected $casts = [
        'visited_at' => 'datetime',
        'ip' => 'string',
    ];

    // hash('sha256', $ip)
    protected function setIpAttribute($value)
    {
        $this->attributes['ip'] = hash('sha256', $value);
    }
}
