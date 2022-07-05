<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;

class Item extends Component
{
    public $article;
    public function render()
    {
        return view('livewire.blog.item');
    }
}
