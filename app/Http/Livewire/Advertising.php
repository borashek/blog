<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adv;
use Livewire\WithFileUploads;

class Advertising extends Component
{
    use WithFileUploads;

    public $advertisements, $advertisement_id, $image, $link, $site_title;
    public $isOpen = 0;

    protected $listeners = ['advertisementUploaded' => 'handleFileUpload'];


    public function handleFileUpload($image)
    {
        $this->image = $image;
    }


    public function render()
    {
        $this->advertisements = Adv::all();
        return view('admin.advertising.advertisements');
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
        $this->image      = '';
        $this->site_title = '';
        $this->link       = '';

        return view('admin.advertising.create');
    }


    public function store()
    {
        $this->validate([
            'image'      => 'required',
            'site_title' => 'required',
            'link'       => 'required'
        ]);

        Adv::updateOrCreate(
            ['id'         => $this->advertisement_id],
            ['image'      => $this->image,
            'site_title' => $this->site_title,
            'link'       => $this->link]
        );

        session()->flash('message',
            $this->advertisement_id ? 'Advertisement Updated Successfully.' : 'Advertisement Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $advertisement = Adv::findOrFail($id);

        $this->advertisement_id = $id;
        $this->image            = $advertisement->image;
        $this->site_title       = $advertisement->site_title;
        $this->link             = $advertisement->link;

        $this->openModal();
    }


    public function delete($id)
    {
        Adv::find($id)->delete();
        session()->flash('message', 'Advertisement Deleted Successfully.');
    }
}
