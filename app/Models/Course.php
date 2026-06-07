<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use BelongsToInstitution, HasFactory, SoftDeletes;

    protected $fillable = [
        'institution_id', 'name', 'department_id', 'photo',
        'requirement', 'duration', 'exam_body',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
