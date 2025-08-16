<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

     protected $fillable = [
        'name',
        'photo',
        'short_desc',
        'full_desc',
        'banner_pic',
        'facility_pic',
        'facility_pic2',
        'slug'
    ]; 

}
