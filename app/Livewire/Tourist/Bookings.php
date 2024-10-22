<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Bookings extends Component
{

    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.bookings');
    }
}
