<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $title, $category_id, $you_need, $body, $post_id, $img, $search, $schema1;
    public $isOpen = 0;


    public function render()
    {
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
                    ->orWhere('you_need', 'LIKE', $search)
                    ->orWhere('body', 'LIKE', $search)
                    ->latest()->paginate(5);
        return view('admin.blog.posts', ['posts' => $posts]);
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
        $this->category_id   = '';
        $this->title         = '';
        $this->you_need      = '';
        $this->body          = '';
        $this->img           = '';
        $this->post_id       = '';
        $this->schema1       = '';

        return view('admin.blog.create');
    }


    public function store()
    {
        $this->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'you_need'    => 'required',
            'body'        => 'required',
            'img'         => 'required',
            'schema1'     => 'required',
        ]);

        Post::updateOrCreate(
            ['id'          => $this->post_id],
            ['category_id' => $this->category_id,
             'title'       => $this->title,
             'you_need'    => $this->you_need,
             'body'        => $this->body,
             'img'         => $this->img,
             'schema1'     => $this->schema1
        ]);

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->post_id       = $id;
        $this->category_id   = $post->category_id;
        $this->title         = $post->title;
        $this->you_need      = $post->you_need;
        $this->body          = $post->body;
        $this->img           = $post->img;
        $this->schema1       = $post->schema1;

        $this->openModal();
    }


    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }


//    public function getCategory()
//    {
//        return $this->hasOne(Category::class, ['id' => 'category_id']);
//    }
}
