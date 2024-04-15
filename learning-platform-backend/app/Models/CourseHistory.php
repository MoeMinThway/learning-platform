<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_history_id',
        'course_id',
        'user_id',
        'pay_by',
        'get_point',
        
    ];
}
