<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersYourWorks extends Component
{
    public function render()
    {
        return view('livewire.users-your-works')->layout('layouts.user');
    }
}
