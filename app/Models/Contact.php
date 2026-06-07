<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = ['institution_id', 'name', 'email', 'subject', 'message'];
}
