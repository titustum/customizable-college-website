<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = ['institution_id', 'name', 'level', 'display_order'];

    public function departmentTeamMembers()
    {
        return $this->hasMany(DepartmentTeamMember::class);
    }
}
