<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

     protected $fillable = [
        'department_id', 
        'section_assigned',
        'email',
        'phone',
        'name',
        'photo',
        'qualification',
    ];
  
    public function roles()
    {
        return $this->belongsToMany(Role::class)
            ->withPivot([
                'is_primary',
                'is_active',
                'start_date',
                'end_date'
            ])
            ->withTimestamps();
    } 


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
