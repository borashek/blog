<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class UsersCatPost extends Component
{
    public $category;

    public function mount()
    {
        $category = Category::where('id', '=', 'category_id')->get();
    }

    public function render()
    {
        return view('livewire.users-cat-post', ['category' => $category]);
    }
}

