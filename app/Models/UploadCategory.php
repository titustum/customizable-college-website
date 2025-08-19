<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
