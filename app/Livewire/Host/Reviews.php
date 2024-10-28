<?php

namespace App\Livewire\Host;

use App\Models\Review;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Reviews extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews = Review::with('experience')
            ->whereHas('experience', function ($query) {
                $query->where('host_id', Auth::id());
            })
            ->latest()
            ->get();
    }

    // layout
    #[Layout('layouts.host')]
    public function render()
    {
        return view('livewire.host.reviews', [
            'reviews' => $this->reviews,
        ]);
    }
}