<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->orderBy('id')
            ->simplePaginate(3);
        $category = DB::table('categories')
            ->find('id', '=', 'category_id');
        return view('livewire.users-posts', compact('posts', 'category'));
    }

//    public function onePost(Post $id)
//    {
//        $post = Post::find()->where(['id', '=', $id]);
//dd($post);
//        return view('livewire.users-one-post', compact('post'));
//    }

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id');
    }
//
//    public function show($id, $slug)
//    {
//        $post = Post::where('slug', $slug)
//            ->where('status', 'published')
//            ->firstOrFail();
//
//        return view('post.show', compact('post'));
//    }
}
