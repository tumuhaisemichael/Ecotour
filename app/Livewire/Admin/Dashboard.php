<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Experience;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Subscription;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers;
    public $totalExperiences;
    public $totalBookings;
    public $totalRevenue;
    public $pendingReports;

    public function mount()
    {
        // Retrieve counts and relevant data for dashboard metrics
        $this->totalUsers = User::count();
        $this->totalExperiences = Experience::count();
        $this->totalBookings = Booking::count();
        $this->totalRevenue = Payment::where('status', 'completed')->sum('amount');
        $this->pendingReports = Experience::whereHas('reportedExperiences', function ($query) {
            $query->where('status', 'pending');
        })->count();
    }
    // layout
    #[Layout('layouts.admin')]
    public function render()
    {
        $latestBookings = Booking::with(['tourist', 'experience'])
            ->latest()
            ->take(5)
            ->get();

        $latestPayments = Payment::latest()->take(5)->get();

        $latestReviews = Review::with(['tourist', 'experience'])
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'latestBookings' => $latestBookings,
            'latestPayments' => $latestPayments,
            'latestReviews' => $latestReviews,
        ]);
    }
}