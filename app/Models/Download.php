<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'name',
        'file',
        'type',
        'category',
        'size',
        'description',
    ];

    protected $casts = [
        'size' => 'integer',
    ];
}
