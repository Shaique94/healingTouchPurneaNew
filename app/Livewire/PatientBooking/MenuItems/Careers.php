<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Careers extends Component
{
    public $search = '';

    #[Layout('layouts.guest')]
    public function render()
    {
        // $jobs = Job::where('title', 'like', '%' . $this->search . '%')->latest()->get();
        return view('livewire.patient-booking.menu-items.careers');
    }
}
