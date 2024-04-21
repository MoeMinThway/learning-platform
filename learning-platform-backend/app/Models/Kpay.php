<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpay extends Model
{
    use HasFactory;
    protected $fillable = [
        'kpay_id',
        'user_id',
        'image',
        'old_money',
        'new_money',
        'current_money',
        'description',

    ];
}
