<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('About Us')]
class AboutUs extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.about-us');
    }
}
