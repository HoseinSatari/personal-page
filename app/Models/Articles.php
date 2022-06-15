<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory , Sluggable;
    protected $fillable = ['title', 'keyword','body', 'short_descrip', 'is_active', 'user_id', 'poster' , 'slug'  , 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category()
    {
        return $this->morphToMany(Category::class, 'categoriable' , 'categoriable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
