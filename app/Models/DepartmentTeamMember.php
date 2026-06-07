<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DepartmentTeamMember extends Pivot
{
    use BelongsToInstitution;

    protected $table = 'department_team_member';

    protected $fillable = [
        'institution_id',
        'department_id',
        'team_member_id',
        'role_id',
        'custom_title',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
