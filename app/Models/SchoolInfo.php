<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    use HasFactory;

    protected $table = 'college_school_infos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'school_name',
        'ched_no',
        'country',
        'province',
        'city',
        'barangay',
        'zipcode',
        'address',
        'fb',
        'email',
        'logo',
        'phone_no',
        'mobile_no',
        'class_start',
        'class_end',
    ];

}

