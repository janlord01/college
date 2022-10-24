<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'college_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'theme_color',
    ];
}
