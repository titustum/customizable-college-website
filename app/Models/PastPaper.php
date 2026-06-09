<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    use HasFactory;

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
        return $this->belongsTo(Course::class);
    }
}
