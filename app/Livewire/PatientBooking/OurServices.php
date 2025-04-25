<?php

namespace App\Livewire\PatientBooking;

use App\Models\User;
use Livewire\Component;

class OurServices extends Component
{
    public $doctors;
    public $doctorCount;
    public $doctorId;
    public $doctorStatus;

    public function mount($doctorId = null, $doctorStatus = true)
    {
        $this->doctorId = $doctorId;
        $this->doctorStatus = $doctorStatus;
        $this->doctors = User::with('doctor')
            ->where('role', 'doctor')
            ->whereHas('doctor', function($query) {
                $query->where('status', ['1','2']);
            })
            ->take(3)
            ->get();
        $this->doctorCount = $this->doctors->count();
    }
    public function bookAppointment($doctorId = null)
    {
        $doctorId = $doctorId ?? $this->doctorId;
        if ($doctorId) {
            return $this->redirect(route('book.appointment', ['doctorId' => $doctorId]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }
   
  
    public function render()
    {
        return view('livewire.patient-booking.our-services');
    }
}
