<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id', 'name', 'department_id', 'photo', 'course', 'year',
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
