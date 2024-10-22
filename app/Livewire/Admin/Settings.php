<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Settings extends Component
{
    // layout
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.settings');
    }
}
