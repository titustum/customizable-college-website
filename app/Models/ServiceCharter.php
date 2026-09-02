<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LogicException;

class ServiceCharter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_sw',
        'description_en',
        'description_sw',
        'commitments_en',
        'commitments_sw',
        'image_en',
        'image_sw',
        'audio_en',
        'audio_sw',
        'pdf_en',
        'pdf_sw',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'commitments_en' => 'array',
            'commitments_sw' => 'array',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (ServiceCharter $charter): void {
            if (static::query()->exists()) {
                throw new LogicException('Only one service charter is allowed per institution.');
            }
        });
    }
}
