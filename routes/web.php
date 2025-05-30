<?php

use Illuminate\Support\Facades\Route;

// Route untuk semua user (tanpa middleware)
Route::get('/', App\Livewire\Index::class)->name('index');
Route::get('/blog', App\Livewire\Blog::class)->name('blog');

// Route hanya untuk user yang belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', App\Livewire\Login::class)->name('login');
    Route::get('/create-new-account', App\Livewire\Register::class)->name('register');
});

// Route hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Tambahkan route yang butuh login di sini
    Route::get('/dashboard', App\Livewire\Index::class)->name('index');
});






// Route::get('/', App\Livewire\Index::class)->name('index');

// Route::get('/login', App\Livewire\Login::class)->name('login');

// Route::get('/create-new-account', App\Livewire\Register::class)->name('register');

// Route::get('/blog', App\Livewire\Blog::class)->name('blog');
