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

    public $title, $description, $price, $category, $location, $available_dates, $experience_id;
    public $modalMode = false; // to control the modal state

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category' => 'required|in:homestay,cultural_tour,workshop',
        'location' => 'required|string',
        'available_dates' => 'required|json',
    ];

    // Reset form fields
    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->location = '';
        $this->available_dates = '';
        $this->experience_id = '';
    }

    // Open modal to create a new experience
    public function create()
    {
        $this->resetInputFields();
        $this->modalMode = true;
    }

    // Store a new experience
    public function store()
    {
        $this->validate();

        Experience::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'location' => $this->location,
            'available_dates' => $this->available_dates,
            'host_id' => Auth::id(),
        ]);

        session()->flash('message', 'Experience created successfully.');
        $this->resetInputFields();
        $this->modalMode = false; // close the modal
    }

    // Edit an experience
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->experience_id = $id;
        $this->title = $experience->title;
        $this->description = $experience->description;
        $this->price = $experience->price;
        $this->category = $experience->category;
        $this->location = $experience->location;
        $this->available_dates = $experience->available_dates;
        $this->modalMode = true; // open the modal
    }

    // Update experience
    public function update()
    {
        $this->validate();

        $experience = Experience::find($this->experience_id);
        $experience->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'location' => $this->location,
            'available_dates' => $this->available_dates,
        ]);

        session()->flash('message', 'Experience updated successfully.');
        $this->resetInputFields();
        $this->modalMode = false; // close the modal
    }

    // Delete an experience
    public function delete($id)
    {
        Experience::findOrFail($id)->delete();
        session()->flash('message', 'Experience deleted successfully.');
    }

    // Fetch experiences and render them
    public function render()
    {
        $experiences = Experience::where('host_id', Auth::id())->get();

        return view('livewire.admin.experiences', compact('experiences'));
    }
}
