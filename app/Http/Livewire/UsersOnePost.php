<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class UsersOnePost extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.users-one-post')->layout('layouts.user');
    }
}
