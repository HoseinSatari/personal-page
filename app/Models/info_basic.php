<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_basic extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'birth' ,
        'country' ,
        'place',
        'year_work',
        'about' ,
        'email' ,
        'phone',
        'img'
    ];
}
