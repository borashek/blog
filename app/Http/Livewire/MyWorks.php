<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Work;

class MyWorks extends Component
{
    use WithPagination;

    public $title, $you_need, $body, $work_id, $img, $search, $schema1;
    public $isOpen = 0;


    public function render()
    {
        $search = '%' . $this->search . '%';
        $works  = Work::where('title', 'LIKE', $search)
            ->orWhere('you_need', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->latest()->paginate(2);
        return view('admin.my-works.works', ['works' => $works]);
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
        $this->title      = '';
        $this->you_need   = '';
        $this->body       = '';
        $this->img        = '';
        $this->post_id    = '';
        $this->schema1    = '';

        return view('admin.my-works.create');
    }


    public function store()
    {
        $this->validate([
            'title'    => 'required',
            'you_need' => 'required',
            'body'     => 'required',
            'img'      => 'required',
            'schema1'  => 'required',
        ]);

        Work::updateOrCreate(
            ['id'       => $this->post_id],
            ['title'    => $this->title,
             'you_need' => $this->you_need,
             'body'     => $this->body,
             'img'      => $this->img,
             'schema1'  => $this->schema1,
        ]);

        session()->flash('message',
            $this->work_id ? 'Your Work Updated Successfully.' : 'Your Work Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $work = Work::findOrFail($id);

        $this->work_id    = $id;
        $this->title      = $work->title;
        $this->you_need   = $work->you_need;
        $this->body       = $work->body;
        $this->img        = $work->img;
        $this->schema1    = $work->schema1;

        $this->openModal();
    }


    public function delete($id)
    {
        Work::find($id)->delete();
        session()->flash('message', 'Your Work Deleted Successfully.');
    }
}
