<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;

class UsersPosts extends Component
{
    use WithPagination;

    public $search;

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }

    public function render(Post $category_id)
    {
        $category = Category::where('id', '=', $category_id);
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
            ->orWhere('you_need', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->latest()->paginate(4);
        return view('livewire.users-posts', ['posts' => $posts, 'category' => $category])->layout('layouts.user');
    }
}


