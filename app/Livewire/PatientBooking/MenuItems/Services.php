<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Services')]
class Services extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.services');
    }
}
