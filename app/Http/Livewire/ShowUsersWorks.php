<?php

namespace App\Http\Livewire;

use App\Models\WorksOfUsers;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsersWorks extends Component
{
    use WithPagination;

    public $search, $title, $workOfUsers, $workOfUsers_id, $name, $email, $description;
    public $isOpen = 0;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $worksOfUsers  = WorksOfUsers::where('name', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->orWhere('title', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->latest()->paginate(5);
        return view('admin.users-works.show-users-works', ['worksOfUsers' => $worksOfUsers]);
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
        $this->name        = '';
        $this->email       = '';
        $this->title       = '';
        $this->description = '';

        return view('admin.users-works.edit');
    }

    public function store()
    {
        $this->validate([
            'name'        => 'required',
            'email'       => 'required|email',
            'title'       => 'required',
            'description' => 'required',
        ]);

        WorksOfUsers::updateOrCreate(
               ['id'            => $this->workOfUsers_id],
               ['name'          => $this->name,
                'email'         => $this->title,
                'title'         => $this->title,
                'description'   => $this->description,
            ]);

        session()->flash('message',
            $this->workOfUsers_id ? 'Work of the User Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $workOfUsers = WorksOfUsers::findOrFail($id);

        $this->workOfUsers_id  = $id;
        $this->name            = $workOfUsers->name;
        $this->title           = $workOfUsers->title;
        $this->description     = $workOfUsers->description;


        $this->openModal();
    }

    public function delete($id)
    {
        WorksOfUsers::find($id)->delete();
        session()->flash('message', 'Work Deleted Successfully.');
    }
}
