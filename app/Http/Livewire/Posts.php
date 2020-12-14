<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $pic, $category, $categories, $you_need, $body, $post_id, $img, $search, $schema1, $schema2;
    public $isOpen = 0;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function categoryChosen($id)
    {
        $this->category = Category::findOrFail($id);
    }

    public function render(Post $category_id)
    {
        $category = Category::where('id', '=', $category_id);
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
                    ->orWhere('you_need', 'LIKE', $search)
                    ->orWhere('body', 'LIKE', $search)
                    ->latest()->paginate(5);
        return view('admin.blog.posts', ['posts' => $posts, 'category' => $category]);
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
        $this->category      = '';
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
            'category'    => 'required',
            'title'       => 'required',
            'you_need'    => 'required',
            'body'        => 'required',
            'img'         => 'url|max:200|sometimes|nullable',
            'schema1'     => 'url|max:200|sometimes|nullable',
            'pic'         => 'image|max:1024|sometimes|nullable',
            'schema2'     => 'image|max:1024|sometimes|nullable'
        ]);

        Post::updateOrCreate(
            ['id'          => $this->post_id],
            ['category'    => $this->category,
             'title'       => $this->title,
             'you_need'    => $this->you_need,
             'body'        => $this->body,
             'img'         => $this->img,
             'schema1'     => $this->schema1,
             'schema2'     => $this->schema2->hashName(),
             'pic'         => $this->pic->hashName()
        ]);

        if(!empty($this->schema2)) {
            $this->schema2->store('public/imgPosts');
        }

        if(!empty($this->pic)) {
            $this->pic->store('public/imgPosts');
        }

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->post_id       = $id;
        $this->category      = $post->category_id;
        $this->title         = $post->title;
        $this->you_need      = $post->you_need;
        $this->body          = $post->body;
        $this->img           = $post->img;
        $this->schema1       = $post->schema1;
        $this->pic           = $post->pic;
        $this->schema2       = $post->schema2;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
