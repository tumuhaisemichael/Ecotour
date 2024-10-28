<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Payment; 

class Payments extends Component
{
    
    #[Layout('layouts.admin')]
    public function render()
    {
        
        $payments = Payment::with('booking')
        ->orderBy('created_at', 'desc') // Order by latest
        ->get(); 

        
        return view('livewire.admin.payments', compact('payments'));
    }
}
