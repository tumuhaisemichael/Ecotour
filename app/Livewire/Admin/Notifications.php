<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ContactMessage; // Adjust this to match the actual model name

class Notifications extends Component
{
    // layout
    #[Layout('layouts.admin')]

    // Retrieve messages from contact_messages_table
    public function render()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')
            ->get();

        return view('livewire.admin.notifications', [
            'messages' => $messages, // Update to use 'messages'
        ]);
    }

    // Optionally, if you want to implement functionality to mark messages in some way,
    // you can keep these methods. Otherwise, you can remove them.

    // Mark a specific message as read (optional)
    public function markAsRead($messageId)
    {
        // No is_read column, so you may not need this method
    }

    // Mark all messages as read (optional)
    public function markAllAsRead()
    {
        // No is_read column, so you may not need this method
    }
}
