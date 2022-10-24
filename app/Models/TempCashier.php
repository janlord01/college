<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCashier extends Model
{
    use HasFactory;
    protected $table = 'temp_cashier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'cashier_id',
        'description',
        'sub_total',
        'discount',
        'total',
        'cash_entered',
        'mop',
        'ref_id',
        'prof_img',
        'balance',
        'change',
    ];
}
