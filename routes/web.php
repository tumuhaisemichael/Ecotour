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
use App\Livewire\Host\Dashboard as HostDashboard;
use App\Livewire\Host\Experiences as HostExperiences;
use App\Livewire\Host\AddExperience;
use App\Livewire\Host\Bookings as HostBookings;
use App\Livewire\Host\Availability;
use App\Livewire\Host\Earnings;
use App\Livewire\Host\Reviews as HostReviews;

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



Route::middleware([])->prefix('host')->group(function () {
    Route::get('/dashboard', HostDashboard::class)->name('host.dashboard');
    Route::get('/experiences', HostExperiences::class)->name('host.experiences');
    Route::get('/add-experience', AddExperience::class)->name('host.add-experience');
    Route::get('/bookings', HostBookings::class)->name('host.bookings');
    Route::get('/availability', Availability::class)->name('host.availability');
    Route::get('/earnings', Earnings::class)->name('host.earnings');
    Route::get('/reviews', HostReviews::class)->name('host.reviews');
});


require __DIR__ . '/auth.php';
