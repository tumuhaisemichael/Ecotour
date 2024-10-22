<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;

class WriteReview extends Component
{

    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.write-review');
    }
}
