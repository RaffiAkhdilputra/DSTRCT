<?php

use Illuminate\Support\Facades\Route;



Route::get('/', App\Livewire\Index::class)->name('index');

Route::get('/login', App\Livewire\Login::class)->name('login');

Route::get('/create-new-account', App\Livewire\Register::class)->name('register');


