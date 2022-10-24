<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'college_course';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_name',
        'course_code',
        'course_description',
        'course_slug',
    ];
}
