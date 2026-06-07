<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'institution_id',
        'title',
        'description',
        'file_path',
        'category',
        'is_public',
    ];
}
