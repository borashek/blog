<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersMyWorks extends Component
{
    public function render()
    {
        return view('livewire.users-my-works')->layout('layouts.user');
    }
}
