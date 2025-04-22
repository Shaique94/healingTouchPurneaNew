<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Services')]
#[Layout('layouts.guest')]

class Services extends Component
{

    public function render()
    {
        return view('livewire.patient-booking.menu-items.services');
    }
}
