<?php

namespace App\Livewire\Host;

use App\Models\Booking;
use App\Models\Experience;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $selectedBooking;

    // Form fields
    public $tourist_id;
    public $experience_id;
    public $booking_date;
    public $scheduled_date;
    public $total_amount;
    public $payment_status = 'pending';

    // Validation rules
    protected $rules = [
        'tourist_id' => 'required|exists:users,id',
        'experience_id' => 'required|exists:experiences,id',
        'booking_date' => 'required|date',
        'scheduled_date' => 'required|date|after:booking_date',
        'total_amount' => 'required|numeric|min:0',
        'payment_status' => 'required|in:pending,paid,cancelled'
    ];

    public function mount()
    {
        $this->booking_date = now()->format('Y-m-d\TH:i');
    }

    public function render()
    {
        $bookings = Booking::with(['tourist', 'experience'])
            ->latest()
            ->paginate(10);

        $tourists = User::where('role', 'tourist')->get();
        $experiences = Experience::all();

        return view('livewire.host.bookings', [
            'bookings' => $bookings,
            'tourists' => $tourists,
            'experiences' => $experiences,
        ])->layout('layouts.host');
    }

    public function createBooking()
    {
        $this->resetValidation();
        $this->reset(['tourist_id', 'experience_id', 'scheduled_date', 'total_amount', 'payment_status']);
        $this->booking_date = now()->format('Y-m-d\TH:i');
        $this->editMode = false;
        $this->showModal = true;
    }

    public function editBooking(Booking $booking)
    {
        $this->resetValidation();
        $this->selectedBooking = $booking;
        $this->tourist_id = $booking->tourist_id;
        $this->experience_id = $booking->experience_id;
        $this->booking_date = $booking->booking_date->format('Y-m-d\TH:i');
        $this->scheduled_date = $booking->scheduled_date->format('Y-m-d\TH:i');
        $this->total_amount = $booking->total_amount;
        $this->payment_status = $booking->payment_status;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode) {
            $this->selectedBooking->update([
                'tourist_id' => $this->tourist_id,
                'experience_id' => $this->experience_id,
                'booking_date' => $this->booking_date,
                'scheduled_date' => $this->scheduled_date,
                'total_amount' => $this->total_amount,
                'payment_status' => $this->payment_status,
            ]);

            $this->dispatch('booking-updated');
        } else {
            Booking::create([
                'tourist_id' => $this->tourist_id,
                'experience_id' => $this->experience_id,
                'booking_date' => $this->booking_date,
                'scheduled_date' => $this->scheduled_date,
                'total_amount' => $this->total_amount,
                'payment_status' => $this->payment_status,
            ]);

            $this->dispatch('booking-created');
        }

        $this->showModal = false;
        $this->reset();
    }

    public function deleteBooking(Booking $booking)
    {
        $booking->delete();
        $this->dispatch('booking-deleted');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset();
    }
}
