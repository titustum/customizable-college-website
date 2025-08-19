<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = ['name', 'slug', 'upload_category_id'];

    public function category()
    {
        return $this->belongsTo(UploadCategory::class, 'upload_category_id');
    }
}
