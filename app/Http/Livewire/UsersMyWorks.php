<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Work;

class UsersMyWorks extends Component
{
    public function render()
    {
        $works = Work::all();

        return view('livewire.users-my-works', ['works' => $works])->layout('layouts.user');
    }
}
