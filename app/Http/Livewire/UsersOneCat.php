<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithPagination;

class UsersOneCat extends Component
{
    public $category;

    use WithPagination;

    public function mount($id)
    {
        $this->category = Category::find($id);
    }

    public function render()
    {
        $posts = Post::where('category_id', 'LIKE', 'id')
                ->latest()->paginate(2);

        return view('livewire.users-one-cat', ['posts' => $posts])->layout('layouts.user');
    }
}
