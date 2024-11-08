<?php

namespace App\Livewire\Tourist;

use App\Models\Booking;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BookingInfo extends Component
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


    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.booking-info');
    }
}
