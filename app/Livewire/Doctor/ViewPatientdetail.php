<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.doctor')]
#[Title('Patient Details')]
class ViewPatientdetail extends Component
{
    public $patient;
    public $currentAppointment;
    public $appointment_id;
    public $statusColors = [
        'checked_in' => 'bg-blue-100 text-blue-800',
        'confirmed' => 'bg-green-100 text-green-800',
        'pending' => 'bg-yellow-100 text-yellow-800',
        'cancelled' => 'bg-red-100 text-red-800',
    ];
    public $statusDisplay = [
        'checked_in' => 'Checked In',
        'confirmed' => 'Completed',
        'pending' => 'Pending',
        'cancelled' => 'Cancelled',
    ];

    public function mount($appointment_id)
    {
        $this->appointment_id = $appointment_id;
        $this->currentAppointment = Appointment::with('patient')->findOrFail($appointment_id);
        $this->patient = $this->currentAppointment->patient;
    }

    public function render()
    {
        return view('livewire.doctor.view-patientdetail');
    }
}
