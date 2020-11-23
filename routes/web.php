<?php

use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Livewire\UsersOnePost;
use App\Http\Livewire\UsersPosts;
use App\Http\Livewire\Cats;
use App\Http\Livewire\Advertising;
use App\Http\Livewire\UsersInspiration;
use App\Http\Livewire\UsersAboutMe;
use App\Http\Livewire\UsersYourWorks;
use App\Http\Livewire\UsersMyWorks;

//Admin routes
Route::get('/admin/blog/posts', Posts::class)->name('admin');
Route::get('/admin/blog/categories', Cats::class)->name('category');
Route::get('/admin/blog/advertising', Advertising::class)->name('adv');

//Common routes
Route::get('/', [SiteController::class, 'welcome'])->name('home');
Route::get('/blog/posts', UsersPosts::class)->name('blog');
Route::get('/blog/post/{id}', UsersOnePost::class)->name('post');
Route::get('/inspiration', UsersInspiration::class)->name('ins');
Route::get('/about-me', UsersAboutMe::class)->name('about-me');
Route::get('/your-works', UsersYourWorks::class)->name('your-works');
Route::get('/my-works', UsersMyWorks::class)->name('my-works');

//Dashboard routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


