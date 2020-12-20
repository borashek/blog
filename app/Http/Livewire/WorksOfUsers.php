<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WorkOfUsers;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class WorksOfUsers extends Component
{
    public $title, $body, $workOfUsers_id, $search, $img;
    public $isOpen = 0;

    use WithFileUploads;
    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $worksOfUsers  = WorkOfUsers::where('title', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
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
        $this->title = '';
        $this->body = '';
        $this->workOfUsers_id = '';
    }

    public function store()
    {
        $this->validate([
            'title'   => 'required',
            'body'    => 'required',
            'img'     => 'image|max:1024'
        ]);

        WorkOfUsers::updateOrCreate(['id' => $this->workOfUsers_id], [
            'title'    => $this->title,
            'body'     => $this->body,
            'img'      => $this->img->hashName(),
        ]);

        if(!empty($this->img)) {
            $this->img->store('public/docs');
        }

        session()->flash('message',
            $this->workOfUsers_id ? 'Пост успешно обновлен.' : 'Пост успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $workOfUsers = WorkOfUsers::findOrFail($id);
        $this->workOfUsers_id    = $id;
        $this->title      = $workOfUsers->title;
        $this->body       = $workOfUsers->body;
        $this->img        = $workOfUsers->img;
        $this->openModal();
    }

    public function delete($id)
    {
        WorkOfUsers::find($id)->delete();
        session()->flash('message', 'Пост успешно удален.');
    }
}
