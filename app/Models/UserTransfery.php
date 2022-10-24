<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class UserTransfery extends Model
{
    use HasFactory;

    /**
     * 
     * Activity log
     */
    protected $table = 'transfery_users';
    protected $primaryKey = 'transfery_id';

    protected $fillable = [
        'user_id',
        'last_grade_completed',
        'last_school_year_completed',
        'school_name',
        'school_address',
        'school_id'
    ];

}
