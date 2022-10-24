<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = 'college_academic_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'acad_year',
        'status',
        'due_date',
    ];
}
