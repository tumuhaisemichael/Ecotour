<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;  // Added this import

#[Layout('layouts.admin')]
class Experiences extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $category, $location, $available_dates, $experience_id;
    public $modalMode = false; // to control the modal state
    public $photo;
    public $existingPhoto;

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category' => 'required|in:homestay,cultural_tour,workshop',
        'location' => 'required|string',
        'photo' => 'nullable|image|max:1024', // max 1MB
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
        $this->photo = null;
        $this->existingPhoto = null;
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

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('experiences', 'public');
        }

        Experience::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'location' => $this->location,
            'available_dates' => $this->available_dates,
            'photo' => $photoPath,
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
        $this->existingPhoto = $experience->photo;

        $this->modalMode = true; // open the modal
    }

    // Update experience
    public function update()
    {
        $this->validate();

        $experience = Experience::find($this->experience_id);

        // Check if experience exists before continuing
        if ($experience) {
            $photoPath = $experience->photo;
            if ($this->photo) {
                // Delete old photo if it exists
                if ($experience->photo) {
                    Storage::disk('public')->delete($experience->photo);
                }
                // Store new photo
                $photoPath = $this->photo->store('experiences', 'public');
            }

            $experience->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category' => $this->category,
                'location' => $this->location,
                'available_dates' => $this->available_dates,
                'photo' => $photoPath
            ]);

            session()->flash('message', 'Experience updated successfully.');
        } else {
            session()->flash('error', 'Experience not found.');
        }

        $this->resetInputFields();
        $this->modalMode = false; // close the modal
    }

    // Delete an experience
    public function delete($id)
    {
        $experience = Experience::findOrFail($id);

        if ($experience) {
            // Delete the photo if it exists
            if ($experience->photo) {
                Storage::disk('public')->delete($experience->photo);
            }

            $experience->delete();
            session()->flash('message', 'Experience deleted successfully.');
        } else {
            session()->flash('error', 'Experience not found.');
        }
    }

    // Fetch experiences and render them
    public function render()
    {
        $experiences = Experience::all();

        return view('livewire.admin.experiences', compact('experiences'));
    }
}
