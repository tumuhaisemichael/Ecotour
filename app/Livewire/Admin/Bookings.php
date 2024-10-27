<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;  // Import the Booking model
use App\Models\User;     // Import the User model
use App\Models\Experience; // Import the Experience model
use Livewire\WithPagination; // Use pagination

class Bookings extends Component
{
    use WithPagination; // Enable pagination

    #[Layout('layouts.admin')]
    public function render()
    {
        // Retrieve bookings with related tourist and experience data
        $bookings = Booking::with(['tourist', 'experience'])
            ->latest() // Order by latest bookings
            ->paginate(10); // Paginate results

        return view('livewire.admin.bookings', [
            'bookings' => $bookings, // Pass bookings data to the view
        ]);
    }
}
