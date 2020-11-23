<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersAboutMe extends Component
{
    public function render()
    {
        return view('livewire.users-about-me')->layout('layouts.user');
    }
}
