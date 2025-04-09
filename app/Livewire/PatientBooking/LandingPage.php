<?php

namespace App\Livewire\PatientBooking;

use Livewire\Attributes\Layout;
use Livewire\Component;

class LandingPage extends Component
{
    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.patient-booking.landing-page');
    }
}
