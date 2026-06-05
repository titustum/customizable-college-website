<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

     protected $fillable = [
        'department_id',
        'role_id',
        'section_assigned',
        'email',
        'phone',
        'name',
        'photo',
        'qualification',
    ];
 
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
