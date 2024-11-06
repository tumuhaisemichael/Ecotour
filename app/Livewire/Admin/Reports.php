<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;

class Reports extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        // Retrieve the total users and bookings
        $totalUsers = User::count();
        $totalBookings = Booking::count();
        $totalRevenue = Payment::where('status', 'completed')->sum('amount');

        // Get the revenue data for the last 4 weeks
        $revenueData = [];
        for ($i = 3; $i >= 0; $i--) {
            // Get the start of the week for each week (e.g., 4 weeks ago, 3 weeks ago)
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();

            // Format dates for labels (e.g., '2024-10-01 - 2024-10-07')
            $weekLabel = $startOfWeek->format('Y-m-d') . ' - ' . $endOfWeek->format('Y-m-d');

            // Get the total revenue for this week
            $weeklyRevenue = Payment::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                                    ->where('status', 'completed')
                                    ->sum('amount');

            // Add this to the revenue data
            $revenueData[] = [
                'week' => $weekLabel,
                'revenue' => $weeklyRevenue,
            ];
        }

        return view('livewire.admin.reports', [
            'totalUsers' => $totalUsers,
            'totalBookings' => $totalBookings,
            'totalRevenue' => $totalRevenue,
            'revenueData' => $revenueData,
        ]);
    }
}
