<?php

namespace App\Livewire\Tourist;

use Livewire\Component;
use App\Models\Experience;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class WriteReview extends Component
{

    public $experienceId;
    public $rating;
    public $comment;
    public $experience;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|min:10|max:500'
    ];

    public function mount($experience)
    {
        $this->experience = Experience::findOrFail($experience);
        $this->experienceId = $this->experience->id;
    }


    public function submitReview()
    {
        $this->validate();

        Review::create([
            'tourist_id' => Auth::id(),
            'experience_id' => $this->experienceId,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        session()->flash('message', 'Your review has been submitted successfully.');
        return redirect()->route('tourist.dashboard');
    }


    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.write-review');
    }
}