<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;

#[Title('Services')]
#[Layout('layouts.guest')]
class Services extends Component
{
    public function render()
    {
        return view('livewire.patient-booking.menu-items.services');
    }
}
