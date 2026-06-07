<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use BelongsToInstitution, HasFactory;

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

    protected function setIpAttribute($value)
    {
        $this->attributes['ip'] = hash_hmac('sha256', $value, config('app.key'));
    }
}
