<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('Doctor')]
class DoctorDetails extends Component
{
    public $doctor;
    public $doctorId;
    public $doctorStatus;
    public $contactPhone ; 
   
    public function mount($doctorId = null, $doctorStatus = true)
    {
        $this->doctor = Doctor::with(['user', 'department'])->findOrFail($doctorId);

        $this->doctorId = $doctorId;
        $this->doctorStatus = $doctorStatus;
        $this->contactPhone = Setting::where('key', 'contact_phone')->value('value') ?? '9471659700';
    }
    public function bookAppointment()
    {
        if ($this->doctorId) {
            return $this->redirect(route('book.appointment', ['doctorId' => $this->doctorId]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.doctor-details', [
            'contact_phone' => $this->contactPhone,
        ]);
    }
}
