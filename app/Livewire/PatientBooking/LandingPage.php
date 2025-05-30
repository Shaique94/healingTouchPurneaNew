<?php

namespace App\Livewire\PatientBooking;

use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LandingPage extends Component
{
   
    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.patient-booking.landing-page', [
            'hospital_name' => Setting::get('hospital_name', 'Healing Touch Hospital'),
            'contact_email' => Setting::get('contact_email', 'info@healingtouchpurnea.com'),
            'contact_phone' => Setting::get('contact_phone', '+91 9471659700'),
            'address' => Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301'),
        ]);
    }
}
