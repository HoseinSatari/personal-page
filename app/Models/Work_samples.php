<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work_samples extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'time_end',
        'customer',
        'link',
        'poster',
        'screen_shot',
        'order_number',
    ];

    public function skills()
    {
         return $this->belongsToMany(Skills::class , 'skill_work' , 'work_id' , 'skill_id');
    }
    public function category()
    {
        return $this->morphToMany(Category::class, 'categoriable' , 'categoriable');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
