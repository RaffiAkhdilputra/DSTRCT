<?php

use Illuminate\Support\Facades\Route;



Route::get('/', App\Livewire\Index::class)->name('index');

Route::get('/login', App\Livewire\Login::class)->name('login');


