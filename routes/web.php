<?php

use App\Http\Livewire\WorksOfUsers;
use App\Http\Livewire\Posts;
use App\Http\Livewire\UsersOneCat;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Livewire\Users;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\MyWorks;
use App\Http\Livewire\ShowUsersWorks;

//Admin routes
Route::get('/admin/blog/posts', Posts::class)->name('admin');
Route::get('/admin/blog/categories', Cats::class)->name('category');
Route::get('/admin/blog/advertising', Advertising::class)->name('adv');
Route::get('/admin/users', Users::class)->name('users');
Route::get('/admin/roles', Roles::class)->name('roles');
Route::get('/admin/roles/permissions', Permissions::class)->name('permissions');
Route::get('/admin/my-works', MyWorks::class)->name('works');
Route::get('admin/users-works', WorksOfUsers::class)->name('show-users-works');

//Common routes
Route::get('/send-me-your-work', WorksOfUsers::class)->name('users-works');
Route::post('/blog/users-works', [SiteController::class, 'submit'])->name('send');

Route::get('/', [SiteController::class, 'welcome'])->name('home');
Route::get('/blog/posts', UsersPosts::class)->name('blog');
Route::get('/blog/post/{id}', UsersOnePost::class)->name('post');
Route::get('/inspiration', UsersInspiration::class)->name('ins');
Route::get('/about-me', UsersAboutMe::class)->name('about-me');
Route::get('/your-works', UsersYourWorks::class)->name('your-works');
Route::get('/my-works', UsersMyWorks::class)->name('my-works');
Route::get('/blog/category/{id}', UsersOneCat::class)->name('one-cat');

//Dashboard routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

