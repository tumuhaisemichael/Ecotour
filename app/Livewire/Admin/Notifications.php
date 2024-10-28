<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ContactMessage;

class Notifications extends Component
{
    // layout
    #[Layout('layouts.admin')]
    public function render()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')
            ->get();

        return view('livewire.admin.notifications', [
            'messages' => $messages,
        ]);
    }
}