<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft_skills extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year_work',
        'percent',
        'icon_code',
        'order_number',

    ];
}
