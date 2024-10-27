<?php

namespace App\Livewire\Tourist;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Experience;

class BrowseExperiences extends Component
{

    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        $experiences = Experience::with('host')
            ->where('available_dates', '!=', null)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.tourist.browse-experiences', compact('experiences'));
    }
}
