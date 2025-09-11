<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'name', 'department_id', 'photo', 'course', 'year',
        'occupation', 'company', 'statement', 'rating',
        'is_approved',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getPhotoUrlAttribute()
    {
        return asset('storage/'.$this->photo);
    }
}
