<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersNav extends Component
{
    public function render()
    {
        return view('livewire.users-nav')->layout('layouts.user');
    }
}
