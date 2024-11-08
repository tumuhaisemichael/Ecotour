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

        // Validate input dates
        $this->validate([
            'bookingDate' => 'required|date',
            'scheduledDate' => 'required|date|after_or_equal:bookingDate',
        ]);

        // Retrieve the logged-in user and their balance
        $user = Auth::user();
        $userBalance = $user->user_balance;
        $bookingAmount = $this->totalAmount;

        // Check if the user has enough coins for payment
        if ($userBalance >= $bookingAmount) {
            // Deduct coins from the user's balance
            $user->update(['user_balance' => $userBalance - $bookingAmount]);

            // Set payment status to 'Paid'
            $paymentStatus = 'Paid';
        } else {
            // Insufficient balance, mark payment status as 'Pending'
            $paymentStatus = 'Pending';
        }

        // Create the booking with the appropriate payment status
        Booking::create([
            'tourist_id' => $user->id,
            'experience_id' => $this->experienceId,
            'booking_date' => now(),
            'scheduled_date' => $this->scheduledDate,
            'total_amount' => $bookingAmount,
            'payment_status' => $paymentStatus,
        ]);

        // Set a session flash message based on the payment status
        $message = $paymentStatus === 'Paid'
            ? 'Your booking has been successfully submitted and paid!'
            : 'Your booking has been submitted but is awaiting payment due to insufficient balance.';

        session()->flash('message', $message);

        return redirect()->route('tourist.dashboard'); // or route to a confirmation page
    }



    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.booking-details');
    }
}
