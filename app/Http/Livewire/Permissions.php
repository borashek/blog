<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $search, $name, $permission_id;
    public $isOpen = 0;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $permissions  = Permission::where('name', 'LIKE', $search)
            ->latest()->paginate(20);
        return view('admin.roles.permissions.permissions', ['permissions' => $permissions]);
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

        return view('admin.roles.permissions.create');
    }

    public function store()
    {
        $this->validate([
            'name'  => 'required',
        ]);

        Permission::updateOrCreate(
            ['id'    => $this->permission_id],
            ['name'  => $this->name]
        );

        session()->flash('message',
            $this->permission_id ? 'Permission Updated Successfully.' : 'Permission Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        $this->permission_id  = $id;
        $this->name           = $permission->name;

        $this->openModal();
    }

    public function delete($id)
    {
        Permission::find($id)->delete();
        session()->flash('message', 'Permission Deleted Successfully.');
    }
}
