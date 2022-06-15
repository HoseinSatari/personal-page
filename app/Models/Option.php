<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'sitename',
        'description',
        'keyword',
        'logo',
        'phone_support',
        'phone_admin',
        'instagram',
        'whatsup',
        'linkdin',
        'github',
        'gitlab',
        'stackoverflow',
        'twitter',
        'telegram',
        'is_active',
    ];
}
