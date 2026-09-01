<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeExcludeAssets(Builder $query): Builder
    {
        return $query
            ->where('url', 'not like', '/storage/%')
            ->where('url', 'not like', '/livewire-%')
            ->where('url', 'not like', '/.well-known/%')
            ->where('url', 'not like', '%.js')
            ->where('url', 'not like', '%.css')
            ->where('url', 'not like', '%.png')
            ->where('url', 'not like', '%.jpg')
            ->where('url', 'not like', '%.jpeg')
            ->where('url', 'not like', '%.gif')
            ->where('url', 'not like', '%.svg')
            ->where('url', 'not like', '%.ico')
            ->where('url', 'not like', '%.woff')
            ->where('url', 'not like', '%.woff2')
            ->where('url', 'not like', '%.ttf')
            ->where('url', 'not like', '%.eot')
            ->where('url', 'not like', '%.webp')
            ->where('url', 'not like', '%.avif')
            ->where('url', 'not like', '%.map');
    }
}
