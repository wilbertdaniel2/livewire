<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = true;

    public $title, $content, $image;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048'
    ];

    public function save(){

        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitTo('show-posts','render');

        $this->emit('alert', 'El post se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
