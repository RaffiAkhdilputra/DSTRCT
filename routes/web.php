<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', App\Livewire\Index::class)->name('index');
    Route::get('/blog', App\Livewire\Blog::class)->name('blog');
    Route::get('/shop/page-{currentPage}', App\Livewire\Shop::class)->name('shop');
    Route::get('/profile/{user}', App\Livewire\Profile::class)->name('profile.{user}');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', App\Livewire\Login::class)->name('login');
    Route::get('/create-new-account', App\Livewire\Register::class)->name('register');
});

Route::get('/', App\Livewire\Index::class)->name('index');
Route::get('/profile/user/{name}', App\Livewire\Profile::class)->name('profile.{user}');
Route::get('/blog', App\Livewire\Blog::class)->name('blog');
Route::get('/shop/page-{currentPage}', App\Livewire\Shop::class)->name('shop');


// Route hanya untuk user yang sudah login






// Route::get('/', App\Livewire\Index::class)->name('index');

// Route::get('/login', App\Livewire\Login::class)->name('login');

// Route::get('/create-new-account', App\Livewire\Register::class)->name('register');

// Route::get('/blog', App\Livewire\Blog::class)->name('blog');
