<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class UsersPosts extends Component
{
    use WithPagination;

    public $search;

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
            ->orWhere('you_need', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->latest()->paginate(2);
        return view('livewire.users-posts', ['posts' => $posts])->layout('layouts.user');
    }

//    public function render()
//    {
//        return view('livewire.users-posts',
//            ['posts' => Post::where('title', 'LIKE', '%' . $this->search . '%')
//                            ->orWhere('you_need', 'LIKE', '%' . $this->search . '%')
//                            ->orWhere('body', 'LIKE', '%' . $this->search . '%')
//                            ->latest()
//                            ->paginate(2)])
//                            ->layout('layouts.user');
//    }

//    public function render()
//    {
//        return view('livewire.users-posts', [
//
//            'posts' => Post::where(function($sub_query)
//                        {
//                            $sub_query->where('title', 'LIKE', '%' . $this->search . '%')
//                                ->orWhere('you_need', 'LIKE', '%' . $this->search . '%')
//                                ->orWhere('body', 'LIKE', '%' . $this->search . '%');
//                        })
//                    ])->latest()->paginate(2)->layout('layouts.user');
//    }

//    public function render()
//    {
//        $search1 = '%' . $this->search . '%';
//        $posts  = Post::where('title', 'LIKE', $search1)
//                    ->orWhere('you_need', 'LIKE', $search1)
//                    ->orWhere('body', 'LIKE', $search1)
//                    ->latest()->paginate(2);
//        return view('livewire.users-posts', ['posts' => $posts])->layout('layouts.user');
//    }

}


