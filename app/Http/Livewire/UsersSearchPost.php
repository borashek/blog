<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class UsersSearchPost extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.users-search-post');
    }

    public function search($search)
    {
        $posts = [];
        $posts = Post::where('text', 'LIKE', '%' . $this->search . '%')->get();
dd($posts);
//        return view('livewire.users-posts', ['posts' => $posts]);
    }
}
