<?php

use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;

// Tampilkan landing page di root URL
Route::get('/', function () {
    return view('livewire.home'); // Menampilkan view home.blade.php di resources/views/livewire
})->name('home');

// Tampilkan halaman login Laravel
Route::get('/login', function () {
    return redirect()->route('filament.admin.auth.login'); // Arahkan ke rute login Laravel
})->name('login');

// Rute untuk artikel dengan slug
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');