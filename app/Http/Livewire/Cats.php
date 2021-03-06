<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Cats extends Component
{
    public $category_id, $categories, $name;
    public $isOpen = 0;


    public function render()
    {
        $this->categories = Category::all();
        return view('admin.blog.categories.categories');
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
        $this->name = '';

        return view('admin.blog.categories.create');
    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Category::updateOrCreate(
            ['id' => $this->category_id],
            ['name' => $this->name,]
        );

        session()->flash('message',
            $this->category_id ? 'Category Updated Successfully.' : 'Category Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $this->category_id = $id;
        $this->name        = $category->name;

        $this->openModal();
    }


    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
}
