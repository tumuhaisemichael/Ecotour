<?php

namespace App\Livewire\Tourist;


use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Bookings extends Component
{
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::with('experience')
            ->where('tourist_id', Auth::id())
            ->get();
    }
    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.bookings');
    }
}