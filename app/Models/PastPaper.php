<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id',
        'title',
        'course_id',
        'unit_name',
        'exam_type',
        'exam_year',
        'term',
        'file_path',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
