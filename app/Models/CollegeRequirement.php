<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeRequirement extends Model
{
    use HasFactory;

    protected $table = 'college_requirements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'status',
    ];
}
