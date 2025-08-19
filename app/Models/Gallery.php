<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function gallery_items()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
