<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $Appointments=0;
    public $Patients = 0;
    public $Doctors = 0;
    public $Revenue = 0;
    public function mount()
    {
        $this->Appointments = Appointment::count();
        $this->Patients = Patient::count();
        $this->Doctors = Doctor::count();
        $this->Revenue = Appointment::with('doctor')
        ->get()
        ->sum(function ($appointment) {
            return $appointment->doctor->fee ?? 0;
        });   
     }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $allAppointments = Appointment::get();
        return view('livewire.admin.index', [
            'Appointments' => $this->Appointments,
            'Patients' => $this->Patients,
            'Doctors' => $this->Doctors,
            'Revenue' => $this->Revenue,
            'allAppointments' => $allAppointments,  
        ]);
    }
}
