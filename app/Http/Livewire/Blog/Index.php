<?php

namespace App\Http\Livewire\Blog;

use App\Models\Articles;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $readyToLoad = false;
    public $sort;
    public $search;
    public $category;
    protected $queryString = ['category' => ['except' => ''],  'sort' => ['except' => ''] , 'search' => ['except' => '']];
    public function paginationView()
    {
        return 'layouts.paginate';
    }
    public function load()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        if ($this->readyToLoad) {

            $articles = Articles::query()->orderBy('created_at' , 'desc');

            if ($this->category) {
                $category = Category::whereslug($this->category)->firstorfail();
                $articles = $articles->WhereHas('category', function ($query) use ($category) {
                    $query->where('id', "$category->id");
                });
            }

            if ($keyword = $this->search){
                $articles = $articles->orwhere('title' , 'like' , "%{$keyword}%")
                    ->orwhere('body' , 'like' , "%{$keyword}%")
                    ->orWhereHas('category', function ($query) use ($keyword) {
                        $query->where('title', 'LIKE', "%{$keyword}%");
                    });
            }

            if ($this->sort == 'asc') {
                $articles = $articles->orderBy('created_at');
            } elseif ($this->sort == 'desc') {
                $articles = $articles->orderByDesc('created_at');
            }

            $articles = $articles->paginate(3);
        } else {
            $articles = [];
        }

        return view('livewire.blog.index' , compact('articles'));
    }
}
