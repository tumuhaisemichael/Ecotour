<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Bookings extends Component
{
    public $bookings;
    public $paymentMethod;
    public $experience_id;
    public $scheduled_date;
    public $total_amount;

    protected $rules = [
        'paymentMethod' => 'required|in:paypal,mobile_money,credit_card',
        'experience_id' => 'required|exists:experiences,id',
        'scheduled_date' => 'required|date',
        'total_amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        // Eager load the experience details with bookings
        $this->bookings = Booking::with('experience')
            ->where('tourist_id', Auth::id())
            ->get();
    }

    public function submitBooking()
    {
        $this->validate();

        DB::transaction(function () {
            $booking = Booking::create([
                'tourist_id' => Auth::id(),
                'experience_id' => $this->experience_id,
                'booking_date' => now(),
                'scheduled_date' => $this->scheduled_date,
                'total_amount' => $this->total_amount,
                'payment_status' => 'pending',
            ]);

            Payment::create([
                'booking_id' => $booking->id,
                'payment_method' => $this->paymentMethod,
                'amount' => $this->total_amount,
                'status' => 'pending',  
                'transaction_reference' => null,
            ]);
        });

        // Refresh bookings after a new one is created
        $this->bookings = Booking::with('experience')
            ->where('tourist_id', Auth::id())
            ->get();

        session()->flash('message', 'Booking and payment method saved successfully.');
    }

    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.bookings', [
            'bookings' => $this->bookings,
        ]);
    }
}
