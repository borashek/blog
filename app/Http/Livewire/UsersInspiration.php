<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersInspiration extends Component
{
    public function render()
    {
        return view('livewire.users-inspiration')->layout('layouts.user');
    }
}
