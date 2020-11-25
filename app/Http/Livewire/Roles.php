<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;

    public $search, $name, $role_id;
    public $isOpen = 0;


    public function render()
    {
        $search = '%' . $this->search . '%';
        $roles  = Role::where('name', 'LIKE', $search)
            ->latest()->paginate(2);
        return view('admin.roles.roles', ['roles' => $roles]);
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
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
        $this->name  = '';

        return view('admin.roles.create');
    }


    public function store()
    {
        $this->validate([
            'name'  => 'required',
        ]);

        Role::updateOrCreate(
            ['id'    => $this->role_id],
            ['name'  => $this->name]
        );

        session()->flash('message',
            $this->role_id ? 'Role Updated Successfully.' : 'Role Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $this->role_id    = $id;
        $this->name       = $role->name;

        $this->openModal();
    }


    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Role Deleted Successfully.');
    }
}
