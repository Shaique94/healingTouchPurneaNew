<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AboutUs extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.about-us');
    }
}
