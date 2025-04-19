<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Doctor')]
class DoctorDetails extends Component
{
    public $doctor;
    public function mount($doctorId)
    {
        $this->doctor = Doctor::with(['user', 'department'])->findOrFail($doctorId);
    }

    public function bookAppointment()
    {
        // will work here if book appoinment is needed
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.doctor-details');
    }
}
