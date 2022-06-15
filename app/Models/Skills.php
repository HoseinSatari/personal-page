<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year_work',
        'percent',
        'icon_code',
        'order_number',

    ];


    public function work()
    {
        return $this->belongsToMany(Work_samples::class , 'skill_work');
    }
}
