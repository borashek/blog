<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use Livewire\Component;

class UsersAdv extends Component
{
    public function render()
    {
        return view('livewire.users-adv', ['advertisements' => Adv::all()]);
    }
}
