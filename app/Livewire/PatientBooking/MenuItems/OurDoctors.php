<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;

class OurDoctors extends Component
{
    public $search = '';
    #[Layout('layouts.guest')]
    public function render()
    {
        $doctors = Doctor::with('user', 'department')->get();

        return view('livewire.patient-booking.menu-items.our-doctors', compact('doctors'));
    }
    public function bookAppointment($doctorId)
    {
        // Example logic - redirect to appointment form
        return redirect()->route('appointments.create', ['doctor_id' => $doctorId]);
    }
}
