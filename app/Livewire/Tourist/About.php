<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{

    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.about');
    }
}