<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'alternative_phone',
        'gender',
        'id_number',
        'course_id',
        'start_term',
        'high_school',
        'high_school_grade',
        'kcse_index_number',
        'kcse_year',
        'nemis_upi_number',
        'parent_name',
        'parent_phone',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('first_name', 'like', '%'.$term.'%')
                ->orWhere('last_name', 'like', '%'.$term.'%')
                ->orWhere('email', 'like', '%'.$term.'%');
        });
    }
}
