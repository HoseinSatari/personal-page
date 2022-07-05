<?php

namespace App\Http\Livewire\Blog;

use App\Models\Articles;
use Livewire\Component;

class Single extends Component
{
//    public $readyToLoad = false;
    public $article;

    public function mount()
    {
        $this->article = Articles::whereslug(request()->slug)->firstOrFail();
    }

//    public function load()
//    {
//        $this->readyToLoad = true;
//    }

    public function render()
    {


//        if ($this->readyToLoad) {
//
//            $comments = $this->article->comments()->where('parent_id', null)->get();
//
//
//        } else {
//            $comments = [];
//        }
        return view('livewire.blog.single');
    }
}
