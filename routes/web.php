<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
use App\Livewire\Tourist\Faq;
use App\Livewire\Host\Dashboard as HostDashboard;
use App\Livewire\Host\Experiences as HostExperiences;
use App\Livewire\Host\Bookings as HostBookings;
use App\Livewire\Host\Reviews as HostReviews;
use App\Livewire\Tourist\Dashboard as TouristDashboard;
use App\Livewire\Tourist\BrowseExperiences;
use App\Livewire\Tourist\Bookings as TouristBookings;
use App\Livewire\Tourist\BookingDetails;
use App\Livewire\Tourist\WriteReview;
use App\Livewire\Tourist\About;
use App\Livewire\Tourist\Contact;

Route::get('/', BrowseExperiences::class)->name('tourist.browse-experiences');
Route::get('/about', About::class)->name('tourist.about');
Route::get('/faq', Faq::class)->name('tourist.faq');
Route::get('/contact', Contact::class)->name('tourist.contact');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
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


Route::middleware(['auth', 'role:host'])->prefix('host')->group(function () {
    Route::get('/dashboard', HostDashboard::class)->name('host.dashboard');
    Route::get('/experiences', HostExperiences::class)->name('host.experiences');
    Route::get('/bookings', HostBookings::class)->name('host.bookings');
    Route::get('/reviews', HostReviews::class)->name('host.reviews');
});


Route::middleware(['auth', 'role:tourist'])->prefix('tourist')->group(function () {
    Route::get('/dashboard', TouristDashboard::class)->name('tourist.dashboard');
    Route::get('/bookings', TouristBookings::class)->name('tourist.bookings');
    Route::get('/booking-details/{id}', BookingDetails::class)->name('tourist.booking-details');
    Route::get('/write-review/{experience}', WriteReview::class)->name('tourist.write-review');
});

Route::post('logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';