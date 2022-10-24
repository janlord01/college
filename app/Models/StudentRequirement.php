<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequirement extends Model
{
    use HasFactory;

    protected $table = 'college_student_requirements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'college_requirement_id',
        'notes',
        'file',
    ];
}
