<?php

namespace App\Livewire\Host;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Availability extends Component
{

    // layout
    #[Layout('layouts.host')]
    public function render()
    {
        return view('livewire.host.availability');
    }
}
