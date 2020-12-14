<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithPagination;

class UsersOneCat extends Component
{
    use WithPagination;

    public $search, $category;

    public function mount($id)
    {
        $this->category = Category::find($id);
    }

    public function render(Category $id)
    {
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
            ->orWhere('you_need', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->orWhere('category_id', '=', $id)
            ->latest()->paginate(4);
        return view('livewire.users-one-cat', ['posts' => $posts])->layout('layouts.user');
    }
}
