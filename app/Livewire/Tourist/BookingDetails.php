<?php

namespace App\Livewire\Tourist;

use App\Models\Booking;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BookingDetails extends Component
{

    public $experienceId;
    public $experience;
    public $bookingDate;
    public $scheduledDate;
    public $totalAmount;

    public function mount($id)
    {
        $this->experienceId = $id;
        $this->experience = Experience::findOrFail($id);
        $this->totalAmount = $this->experience->price;
    }

    public function submitBooking()
    {
        if (!Auth::check()) {
            // Redirect to login page, passing intended URL to redirect back after login
            return redirect()->route('login', ['redirect' => route('tourist.booking-details', $this->experienceId)]);
        }
        $this->validate([
            'bookingDate' => 'required|date',
            'scheduledDate' => 'required|date|after_or_equal:bookingDate',
        ]);

        Booking::create([
            'tourist_id' => Auth::id(),
            'experience_id' => $this->experienceId,
            'booking_date' => now(),
            'scheduled_date' => $this->scheduledDate,
            'total_amount' => $this->totalAmount,
            'payment_status' => 'Pending',
        ]);

        session()->flash('message', 'Your booking has been submitted successfully!');
        return redirect()->route('tourist.dashboard'); // or route to a confirmation page
    }


    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.booking-details');
    }
}
