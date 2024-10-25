<?php


use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\SendPasswordResetLink;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt; // Ensure this is imported

use App\Livewire\Auth\RegisterForm;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\ConfirmPassword;


Route::middleware('guest')->group(function () {
    Volt::route('register', RegisterForm::class) // Using component class
    ->name('register');

    Volt::route('login', Login::class)
        ->name('login');

    Volt::route('forgot-password', SendPasswordResetLink::class)
        ->name('password.request');

    Volt::route('reset-password/{token}', ResetPassword::class)
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', VerifyEmail::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', ConfirmPassword::class)
        ->name('password.confirm');
});



