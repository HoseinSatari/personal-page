<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;

class Send extends Component
{
    public $obj;
    public $status;
    public $name;
    public $phone;
    public $email;
    public $comment;
    public $commentable_type;
    public $commentable_id;
    public $parent_id;
    public $rules = [
        'name' => 'required|string',
        'phone' => ['nullable' , 'ir_mobile:zero'],
        'email' => ['nullable' , 'email'],
        'comment' => ['required'],
    ];
    protected $validationAttributes = [
        'comment' => 'نظر',
    ];

    public function updated($item)
    {
        $this->validateOnly($item);

    }

    public function store()
    {
        $this->validate();
        Comment::create([
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'parent_id' => $this->parent_id,
            'commentable_type' => $this->commentable_type,
            'commentable_id' => $this->commentable_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'comment' => $this->comment
        ]);
        $this->name = $this->phone = $this->comment = $this->email = null;

        $this->emit('toast' , 'success' , 'نظر شما با موفقیت ثبت شد');
    }
    public function render()
    {
        return view('livewire.comment.send');
    }
}
