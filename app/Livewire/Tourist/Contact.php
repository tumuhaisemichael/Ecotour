<?php

namespace App\Livewire\Tourist;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Contact extends Component
{

    public $first_name, $last_name, $email, $phone, $message;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'message' => 'required|string|max:2000',
    ];

    public function submitForm()
    {
        $this->validate();

        ContactMessage::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        // Clear form after submission
        $this->reset(['first_name', 'last_name', 'email', 'phone', 'message']);

        session()->flash('success', 'Thank you! Your message has been received.');
    }


    // layout
    #[Layout('layouts.tourist')]
    public function render()
    {
        return view('livewire.tourist.contact');
    }
}