<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class UsersCats extends Component
{
    public function render()
    {
        return view('livewire.users-cats', ['categories' => Category::all()]);
    }
}
