<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ComponentName extends Component
{
    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.component-name');
    }
}
