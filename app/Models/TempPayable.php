<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempPayable extends Model
{
    use HasFactory;
    protected $table = 'temp_payable';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'breakdown',
        'amount',
    ];
}
