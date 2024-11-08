<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $bookings;
    public $balance;

    public function mount()
    {
        // Initialize user balance and bookings
        $this->balance = Auth::user()->user_balance;
        $this->bookings = Booking::with('experience')
            ->where('tourist_id', Auth::id())
            ->get();
    }

    public function addCoins()
    {
        Auth::user()->increment('user_balance', 1000);
        $this->balance = Auth::user()->user_balance;
        session()->flash('message', '1000 coins have been added to your balance!');
    }
    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.dashboard');
    }
}
