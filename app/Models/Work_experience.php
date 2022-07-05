<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'  ,
        'body',
        'place',
        'start',
        'end',
        'order_number',
        'company',
    ];
}
