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
        $doctors = Doctor::with('user', 'department') 
            ->when($this->search, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('department', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('qualification', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.patient-booking.menu-items.our-doctors', compact('doctors'));
    }
    public function bookAppointment($doctorId)
    {
        return redirect()->route('appointments.create', ['doctor_id' => $doctorId]);
    }
}
