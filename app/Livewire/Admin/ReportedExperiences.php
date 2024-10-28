<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ReportedExperience; 

class ReportedExperiences extends Component
{
    
    #[Layout('layouts.admin')]
    public function render()
    {
        
        $reportedExperiences = ReportedExperience::with('reportedBy')->get();

        
        return view('livewire.admin.reported-experiences', [
            'reportedExperiences' => $reportedExperiences,
        ]);
    }
}
