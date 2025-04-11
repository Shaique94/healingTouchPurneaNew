<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

class All extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $appointment=Appointment::with('doctor','patient')->latest()->get();
        return view('livewire.admin.appointment.all',[
            'appointments' => $appointment,
        ]);
    }
}
