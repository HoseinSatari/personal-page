<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call_me extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'text',
        'seen',
    ];
}
