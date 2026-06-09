<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'level', 'display_order'];

    protected static function booted(): void
    {
        static::creating(fn (Role $role) => $role->slug ??= Str::slug($role->name));
    }

    public function departmentTeamMembers()
    {
        return $this->hasMany(DepartmentAssignment::class);
    }
}
