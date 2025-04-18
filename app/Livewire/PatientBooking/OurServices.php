<?php

namespace App\Livewire\PatientBooking;

use App\Models\User;
use Livewire\Component;

class OurServices extends Component
{
    public $doctors;
    public $doctorCount;

    public function mount(){
        $this->doctors = User::with('doctor')->where('role', 'doctor')->where('isActive',1)->take(3)->get();
        $this->doctorCount =  $this->doctors->count();
        // dd($this->doctors);

    }
  
    public function render()
    {
        return view('livewire.patient-booking.our-services');
    }
}
