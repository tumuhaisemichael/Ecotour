<?php

namespace App\Livewire\Host;

use Illuminate\Support\Facades\Auth;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

#[Layout('layouts.host')]
class Experiences extends Component
{
    use WithFileUploads;

    // Experience fields
    public $experience_id;

    #[Rule('required|string|max:255')]
    public $title = '';

    #[Rule('required|string')]
    public $description = '';

    #[Rule('required|numeric|min:0')]
    public $price = '';

    #[Rule('required|in:homestay,cultural_tour,workshop')]
    public $category = '';

    #[Rule('required|string')]
    public $location = '';

    #[Rule('required|array|min:1')]
    public $available_dates_raw = [];

    #[Rule('nullable|image|max:1024')]
    public $photo;

    public $existingPhoto;
    public $modalMode = false;

    public function mount()
    {
        // Initialize Livewire hooks
        $this->available_dates_raw = [];
        $this->dispatch('initializeFlatpickr');
    }
    public function render()
    {
        return view('livewire.host.experiences', [
            'experiences' => Experience::where('host_id', Auth::id())
                ->latest()
                ->get()
        ]);
    }

    public function create()
    {
        $this->resetForm();
        $this->modalMode = true;
    }

    public function store()
    {
        Log::info('Creating experience:', [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'location' => $this->location,
            'available_dates_raw' => $this->available_dates_raw,
            'photo' => $this->photo
        ]);

        if (is_string($this->available_dates_raw) && !empty($this->available_dates_raw)) {
            $dates = explode(' · ', $this->available_dates_raw);
            $this->available_dates_raw = array_filter(array_map('trim', $dates));
        }

        Log::info($this->available_dates_raw);
        $this->validate();

        try {

            DB::beginTransaction();

            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category' => $this->category,
                'location' => $this->location,
                'available_dates' => $this->formatDatesForStorage($this->available_dates_raw),
                'host_id' => Auth::id(),
            ];

            if ($this->photo) {
                $data['photo'] = $this->photo->store('experiences', 'public');
            }

            Experience::create($data);

            DB::commit();

            session()->flash('message', 'Experience created successfully.');
            $this->resetForm();
            $this->modalMode = false;
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Failed to create experience:', [
                'error' => $e->getMessage(),
                'data' => $data ?? null
            ]);
            session()->flash('error', 'Failed to create experience. Please try again.');
        }
    }

    public function edit($id)
    {
        $experience = Experience::where('host_id', Auth::id())
            ->findOrFail($id);

        $this->experience_id = $experience->id;
        $this->title = $experience->title;
        $this->description = $experience->description;
        $this->price = $experience->price;
        $this->category = $experience->category;
        $this->location = $experience->location;
        $this->available_dates_raw = $experience->available_dates ?? [];
        $this->existingPhoto = $experience->image;

        $this->dispatch('updateFlatpickrDates', [
            'dates' => $this->available_dates_raw
        ]);
        $this->modalMode = true;
    }

    public function update()
    {
        if (is_string($this->available_dates_raw) && !empty($this->available_dates_raw)) {
            $dates = explode(' · ', $this->available_dates_raw);
            $this->available_dates_raw = array_filter(array_map('trim', $dates));
        }
        $this->validate();

        try {
            $experience = Experience::where('host_id', Auth::id())
                ->findOrFail($this->experience_id);


            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category' => $this->category,
                'location' => $this->location,
                'available_dates' => $this->formatDatesForStorage($this->available_dates_raw),
            ];

            if ($this->photo) {
                if ($experience->image) {
                    Storage::disk('public')->delete($experience->image);
                }
                $data['photo'] = $this->photo->store('photos', 'public');
            }

            $experience->update($data);

            session()->flash('message', 'Experience updated successfully.');
            $this->resetForm();
            $this->modalMode = false;
        } catch (\Exception $e) {
            Log::error('Failed to update experience:', [
                'error' => $e->getMessage(),
                'experience_id' => $this->experience_id,
                'data' => $data ?? null
            ]);
            session()->flash('error', 'Failed to update experience. Please try again.');
        }
    }

    public function delete($id)
    {
        try {
            $experience = Experience::where('host_id', Auth::id())
                ->findOrFail($id);

            if ($experience->image) {
                Storage::disk('public')->delete($experience->image);
            }

            $experience->delete();
            session()->flash('message', 'Experience deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete experience:', [
                'error' => $e->getMessage(),
                'experience_id' => $id
            ]);
            session()->flash('error', 'Failed to delete experience. Please try again.');
        }
    }



    private function formatDatesForStorage($dates)
    {
        if (empty($dates)) {
            return [];
        }

        // If it's a string with the flatpickr conjunction
        if (is_string($dates)) {
            $dates = explode(' · ', $dates);
        }

        // Ensure we have an array
        if (!is_array($dates)) {
            return [];
        }

        // Format dates and filter out invalid ones
        $formattedDates = array_filter(array_map(function ($date) {
            try {
                return date('Y-m-d', strtotime(trim($date)));
            } catch (\Exception $e) {
                return null;
            }
        }, $dates));

        // Sort dates chronologically
        sort($formattedDates);

        return array_values($formattedDates);
    }

    public function resetForm()
    {
        $this->reset([
            'experience_id',
            'title',
            'description',
            'price',
            'category',
            'location',
            'available_dates_raw',
            'photo',
            'existingPhoto'
        ]);
        // Reset the flatpickr instance
        $this->available_dates_raw = [];
        $this->dispatch('resetFlatpickr');
    }
}
