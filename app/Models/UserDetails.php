<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table = 'users_details';
    protected $primaryKey = 'personal_id';
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'lrn',
        'dob',
        'gender',
        'nationality',
        'country',
        'province',
        'city',
        'address',
        'zipcode',
        'fb',
        'religion',
        'transfery',
        'stay_with',
        'indigenous',
        'barangay',
        'image_path'
    ];
}
