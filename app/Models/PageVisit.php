<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'url',
        'full_url',
        'referer',
        'ip',
        'user_agent',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
        'ip' => 'string',
    ];

    protected function setIpAttribute($value)
    {
        $this->attributes['ip'] = hash_hmac('sha256', $value, config('app.key'));
    }
}
