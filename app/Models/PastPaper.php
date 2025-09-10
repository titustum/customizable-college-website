<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    protected $fillable = [
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
        return $this->belongsTo(\App\Models\Course::class);
    }
}
