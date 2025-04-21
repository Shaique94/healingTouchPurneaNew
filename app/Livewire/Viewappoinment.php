<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class Viewappoinment extends Component
{
    public $appointment;
    public function mount($id){
        $this->appointment=Appointment::find($id);
    }
    public function render()
    {
        return view('livewire.viewappoinment');
    }
}
