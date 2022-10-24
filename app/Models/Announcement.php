<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'college_announcements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'acad_id',
        'text',
    ];
}
