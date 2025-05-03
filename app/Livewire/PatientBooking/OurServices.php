<?php

namespace App\Livewire\PatientBooking;

use App\Models\User;
use Livewire\Component;

class OurServices extends Component
{
    public $doctors;
    public $doctorCount;
    public $doctorSlug;
    public $doctorStatus;

    public function mount($doctorSlug = null, $doctorStatus = true)
    {
        $this->doctorSlug = $doctorSlug;
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

    public function bookAppointment($doctorSlug)
    {
        if ($doctorSlug) {
            return $this->redirect(route('book.appointment', ['slug' => $doctorSlug]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }

    public function render()
    {
        return view('livewire.patient-booking.our-services');
    }
}
