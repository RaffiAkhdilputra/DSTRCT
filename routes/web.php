<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController; gakepake

Route::middleware(['auth'])->group(function () {
    // if ($user && $user->is_admin) {
    //     Route::get('/admin', App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    //     Route::get('/admin/products', App\Livewire\Admin\Products::class)->name('admin.products');
    //     Route::get('/admin/orders', App\Livewire\Admin\Orders::class)->name('admin.orders');
    //     Route::get('/admin/users', App\Livewire\Admin\Users::class)->name('admin.users');
    // }

    Route::get('/', App\Livewire\Index::class)->name('index');
    Route::get('/blog', App\Livewire\Blog::class)->name('blog');
    Route::get('/shop/page-{currentPage}', App\Livewire\Shop::class)->name('shop');
    Route::get('/profile/{user}', App\Livewire\Profile::class)->name('profile.{user}');
    Route::get('/profile/{user}/edit-profile', App\Livewire\EditProfile::class)->name('profile.{user}.edit');
    Route::get('/blog-post', App\Livewire\BlogPost::class)->name('blog-post');
    Route::get('/wishlist', App\Livewire\Wishlist::class)->name('wishlist');
    Route::get('/cart', App\Livewire\Cart::class)->name('cart');
    Route::get('/payment', App\Livewire\Payment::class)->name('payment');
    Route::get('/product/{slug}', App\Livewire\Show::class)->name('product');
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

