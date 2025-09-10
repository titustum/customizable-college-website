<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    protected $fillable = [
        'title',
        'description',
        'reference_number',
        'department_id',
        'published_at',
        'application_deadline',
        'attachment_path',
        'status',
    ];

    protected $casts = [
        'published_at' => 'date',
        'application_deadline' => 'date',
    ];

    public function isOpen(): bool
    {
        return $this->status === 'open' && now()->lt($this->application_deadline);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Department::class);
    }
}
