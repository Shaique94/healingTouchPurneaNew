<?php

namespace App\Livewire\Comman;

use Livewire\Component;
use App\Models\Setting;
class AppointmentCard extends Component
{
    public $doctorId;
    public $doctorStatus;
    public $contactPhone ; 

    public function mount($doctorId = null, $doctorStatus = true)
    {
        $this->doctorId = $doctorId;
        $this->doctorStatus = $doctorStatus;
        $this->contactPhone = Setting::where('key', 'contact_phone')->value('value') ?? '7079025467';
    }

    public function bookAppointment()
    {
        if ($this->doctorId) {
            return $this->redirect(route('book.appointment', ['doctorId' => $this->doctorId]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }

    public function render()
    {
        return view('livewire.comman.appointment-card', [
            'contact_phone' => $this->contactPhone,
        ]);
    }
}