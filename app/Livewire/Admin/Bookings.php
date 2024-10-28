<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;

    #[Layout('layouts.admin')]

    // Delete a booking by its ID
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id); // Fetch booking
        $booking->delete(); // Delete booking
        session()->flash('message', 'Booking deleted successfully.');
    }

    public function render()
    {
        // Retrieve paginated bookings with tourist and experience data
        $bookings = Booking::with(['tourist', 'experience'])
            ->latest()
            ->paginate(10);

        return view('livewire.admin.bookings', [
            'bookings' => $bookings,
        ]);
    }
}