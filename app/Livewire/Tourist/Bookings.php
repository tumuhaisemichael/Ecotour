<?php 

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Bookings extends Component
{
    public $bookings;
    public $paymentMethod;
    public $experience_id;
    public $scheduled_date;
    public $total_amount;
    public $selectedBookingId;

    protected $rules = [
        'paymentMethod' => 'required|in:paypal,mobile_money,credit_card',
        'experience_id' => 'required|exists:experiences,id',
        'scheduled_date' => 'required|date',
        'total_amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->loadBookings();
    }

    public function loadBookings()
    {
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
                'transaction_reference' => 'MOCK_TRANSACTION_' . strtoupper(Str::random(10)),
            ]);
        });

        $this->loadBookings();

        session()->flash('message', 'Booking and payment method saved successfully.');
    }

    public function openPaymentModal($bookingId)
    {
        $this->selectedBookingId = $bookingId;
        $this->dispatch('showPaymentModal');
    }

    public function initiatePayment()
    {
        if (!$this->paymentMethod) {
            session()->flash('error', 'Please select a payment method.');
            return;
        }

        $booking = Booking::findOrFail($this->selectedBookingId);

        DB::transaction(function () use ($booking) {
            $booking->update(['payment_status' => 'paid']);

            $payment = Payment::firstOrCreate(
                ['booking_id' => $booking->id],
                [
                    'payment_method' => $this->paymentMethod,
                    'amount' => $booking->total_amount,
                    'status' => 'pending',
                    'transaction_reference' => 'MOCK_TRANSACTION_' . strtoupper(Str::random(10)),
                ]
            );

            $payment->update([
                'status' => 'completed',
                'transaction_reference' => 'MOCK_TRANSACTION_' . strtoupper(Str::random(10)),
            ]);
        });

        $this->dispatch('hidePaymentModal');
        session()->flash('message', 'Payment completed successfully.');
        $this->loadBookings();

        
    }

    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.bookings', [
            'bookings' => $this->bookings,
        ]);
    }
}
