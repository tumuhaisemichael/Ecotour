<?php

namespace App\Livewire\Host;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Experience;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public $totalExperiences;
    public $totalBookings;
    public $totalRevenue;
    public $pendingReports;

    public function mount()
    {
        $hostId = Auth::id();

        // Only show counts related to the host
        $this->totalExperiences = Experience::where('host_id', $hostId)->count();
        $this->totalBookings = Booking::whereHas('experience', function ($query) use ($hostId) {
            $query->where('host_id', $hostId);
        })->count();
        $this->totalRevenue = Payment::whereHas('booking.experience', function ($query) use ($hostId) {
            $query->where('host_id', $hostId);
        })->where('status', 'completed')->sum('amount');
        $this->pendingReports = Experience::where('host_id', $hostId)
            ->whereHas('reportedExperiences', function ($query) {
                $query->where('status', 'pending');
            })->count();
    }

    #[Layout('layouts.host')]
    public function render()
    {
        $hostId = Auth::id();

        // Fetch recent data relevant to the host
        $latestBookings = Booking::with(['tourist', 'experience'])
            ->whereHas('experience', function ($query) use ($hostId) {
                $query->where('host_id', $hostId);
            })
            ->latest()
            ->take(5)
            ->get();

        $latestPayments = Payment::whereHas('booking.experience', function ($query) use ($hostId) {
            $query->where('host_id', $hostId);
        })
            ->latest()
            ->take(5)
            ->get();

        $latestReviews = Review::with(['tourist', 'experience'])
            ->whereHas('experience', function ($query) use ($hostId) {
                $query->where('host_id', $hostId);
            })
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.host.dashboard', [
            'latestBookings' => $latestBookings,
            'latestPayments' => $latestPayments,
            'latestReviews' => $latestReviews,
        ]);
    }
}