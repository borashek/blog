<?php

namespace App\Http\Livewire;

use App\Models\WorksOfUsers;
use Livewire\Component;

class UsersWorks extends Component
{
    public $name, $email, $title, $description, $photo, $schema;

    public $isOpen = 0;

    public function render()
    {
        return view('livewire.users-works')->layout('layouts.user');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function sendWork()
    {
        $this->validate([
            'name'           =>      'required|min:3',
            'email'          =>      'required|email',
            'title'          =>      'required|min:5',
            'description'    =>      'required|min:20',
            'photo'          =>      'required', 'image|max:1024',
            'schema'         =>      'image|max:1024'

        ]);

        WorksOfUsers::create([
            'name'          =>      $this->name,
            'email'         =>      $this->email,
            'title'         =>      $this->title,
            'description'   =>      $this->description,
            'photo'         =>      $this->photo,
            'schema'        =>      $this->schema

        ]);

        $photoPath = $this->photo->store('/public/photos_users_works');

        $this->reset(['name', 'email', 'title', 'description', 'photo', 'schema']);

        session()->flash('success', 'Your work has sent Successfully');

        $this->closeModal();
    }
}
