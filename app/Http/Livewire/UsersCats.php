<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class UsersCats extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.users-cats');
    }
}
