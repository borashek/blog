<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search, $name, $email, $user_id;
    public $isOpen = 0;


    public function render()
    {
        $search = '%' . $this->search . '%';
        $users  = User::where('name', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search)
                    ->latest()->paginate(10);
        return view('admin.users.users', ['users' => $users]);
    }


    public function create()
    {
//        $this->resetInputFields();
//        $this->openModal();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }


    private function resetInputFields(){
//        $this->name  = '';
//        $this->email = '';
//
//        return view('admin.users.create');
    }


    public function store()
    {
//        $this->validate([
//            'name'  => 'required',
//            'email' => 'email|required',
//        ]);
//
//        User::updateOrCreate(
//            ['id'    => $this->user_id],
//            ['name'  => $this->name,
//             'email' => $this->email]
//        );
//
//        session()->flash('message',
//            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');
//
//        $this->closeModal();
//        $this->resetInputFields();
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->user_id    = $id;
        $this->name       = $user->name;
        $this->email      = $user->email;

        $this->openModal();
    }


    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
