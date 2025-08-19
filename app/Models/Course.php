<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'department_id', 'photo',
        'requirement', 'duration', 'exam_body',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
