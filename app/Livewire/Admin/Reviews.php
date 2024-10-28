<?php

namespace App\Livewire\Admin;

use App\Models\Review;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Reviews extends Component
{

    // layout
    #[Layout('layouts.admin')]
    public function render()
    {
        $reviews = Review::with(['tourist', 'experience'])->paginate(10);
        return view('livewire.admin.reviews', ['reviews' => $reviews]);
    }
}