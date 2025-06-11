<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController; gakepake

Route::middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Index::class)->name('index');
    Route::get('/blog', App\Livewire\Blog::class)->name('blog');
    Route::get('/shop/page-{currentPage}', App\Livewire\Shop::class)->name('shop');
    Route::get('/profile/{user}', App\Livewire\Profile::class)->name('profile.{user}');
    Route::get('/profile/{user}/edit-profile', App\Livewire\EditProfile::class)->name('profile.{user}.edit');
    Route::get('/blog-post', App\Livewire\BlogPost::class)->name('blog-post');
    Route::get('/wishlist', App\Livewire\Wishlist::class)->name('wishlist');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', App\Livewire\Login::class)->name('login');
    Route::get('/create-new-account', App\Livewire\Register::class)->name('register');
});

Route::get('/', App\Livewire\Index::class)->name('index');
Route::get('/profile/user/{user}', App\Livewire\Profile::class)->name('profile.{user}');
Route::get('/blog', App\Livewire\Blog::class)->name('blog');
Route::get('/shop/page-{currentPage}', App\Livewire\Shop::class)->name('shop');
Route::get('/product/{slug}', App\Livewire\Show::class)->name('product');
Route::get('/blog-post', App\Livewire\BlogPost::class)->name('blog-post');
Route::get('/wishlist', App\Livewire\Wishlist::class)->name('wishlist');

