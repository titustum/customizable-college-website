<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id',
        'title',
        'description',
        'file_path',
        'category',
        'is_public',
    ];
}
