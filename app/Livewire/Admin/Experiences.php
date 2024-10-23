<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
// layout
#[Layout('layouts.admin')]
class Experiences extends Component
{

    public $title;
    public $description;
    public $price;
    public $category;
    public $location;
    public $available_dates;
    public $status = 'active'; // Default value
    public $experiences;

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|in:homestay,cultural_tour,workshop',
        'location' => 'required|string|max:255',
        'available_dates' => 'required|json',
    ];

    public function mount()
    {
        // Fetch all experiences for the authenticated host
        $this->experiences = Experience::where('host_id', Auth::id())->get();
    }

    public function submit()
    {
        // Validate the input data
        $this->validate();

        // Create a new experience and associate it with the authenticated host
        Experience::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'location' => $this->location,
            'host_id' => Auth::id(),
            'available_dates' => $this->available_dates,
            'status' => $this->status,
        ]);

        // Reset the form fields
        $this->reset(['title', 'description', 'price', 'category', 'location', 'available_dates', 'status']);

        // Refresh the experience list
        $this->mount();

        // Optional: Add a success message
        session()->flash('message', 'Experience created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.experiences');
    }
}
