<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , Sluggable , SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'is_active',
        'order_number',
        'poster',
        'parent_id',
    ];
    public function child()
    {
        return $this->hasMany(category::class, 'parent_id', 'id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function articles()
    {
        return $this->morphedByMany(Articles::class, 'category' , 'categoriable' );
    }
    public function work()
    {
        return $this->morphedByMany(Work_samples::class, 'category' , 'categoryable' );
    }

}
