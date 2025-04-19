<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Setting;
use Livewire\Attributes\Title;
#[Title('Contact Us')]

class ContactPage extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.contact-page');
    }
}
