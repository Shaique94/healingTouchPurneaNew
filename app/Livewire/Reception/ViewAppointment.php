<?php

namespace App\Livewire\Reception;

use App\Models\Appointment;
use Livewire\Component;

class ViewAppointment extends Component
{
    public $appointment;
    public function mount($id){
    $this->appointment=Appointment::find($id);
    }
    public function render()
    { 
        return view('livewire.reception.view-appointment',[
            'appointment' => $this->appointment,
        ]);
    }
}
