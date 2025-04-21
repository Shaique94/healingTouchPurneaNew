<?php

namespace App\Livewire\PatientBooking;

use Livewire\Component;
use App\Models\Setting; 

class Footer extends Component
{
    public $settings = [];

    public function mount()
    {
        $this->settings = Setting::pluck('value', 'key')->toArray();
        
    }

    public function render()
    {
        return view('livewire.patient-booking.footer', [
            'settings' => $this->settings,
        ]);
    }
}