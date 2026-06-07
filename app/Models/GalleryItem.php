<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id',
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
