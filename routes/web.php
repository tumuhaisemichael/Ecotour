<?php

use App\Livewire\ComponentName;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// livewire routes
Route::get('/sample', ComponentName::class);
require __DIR__ . '/auth.php';