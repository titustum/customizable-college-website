<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id',
        'title',
        'description',
        'reference_number',
        'opening_date',
        'closing_date',
        'attachment_path',
        'status',
    ];

    protected $casts = [
        'opening_date' => 'date',
        'closing_date' => 'date',
    ];

    /**
     * Check if the tender is still open.
     */
    public function isOpen(): bool
    {
        return $this->status === 'open' && now()->lt($this->closing_date);
    }
}
