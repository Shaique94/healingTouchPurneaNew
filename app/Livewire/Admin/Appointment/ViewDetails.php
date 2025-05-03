<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewDetails extends Component
{
    public $openModal = false;
    public $appointment;

    public function openModel(){
        $this->openModal = true;
    }
    public function closeModel(){
        $this->openModal = false;
    }

    #[On('viewDetails')]
    public function viewDetails($id)
    {

        $this->openModal = true;
        $this->appointment=Appointment::find($id);

    }
    public function render()
    {
        return view('livewire.admin.appointment.view-details');
    }
}
