<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Experiences;
use App\Livewire\Admin\Bookings;
use App\Livewire\Admin\Payments;
use App\Livewire\Admin\Reviews;
use App\Livewire\Admin\Reports;
use App\Livewire\Admin\Settings;
use App\Livewire\Admin\ReportedExperiences;
use App\Livewire\Admin\Notifications;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware([])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/experiences', Experiences::class)->name('admin.experiences');
    Route::get('/bookings', Bookings::class)->name('admin.bookings');
    Route::get('/payments', Payments::class)->name('admin.payments');
    Route::get('/reviews', Reviews::class)->name('admin.reviews');
    Route::get('/reports', Reports::class)->name('admin.reports');
    Route::get('/settings', Settings::class)->name('admin.settings');
    Route::get('/reported-experiences', ReportedExperiences::class)->name('admin.reported-experiences');
    Route::get('/notifications', Notifications::class)->name('admin.notifications');
});

require __DIR__ . '/auth.php';
