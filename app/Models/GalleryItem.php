<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'name',
        'category',
        'description',
        'image',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
