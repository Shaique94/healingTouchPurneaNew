<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Career;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('Jobs')]
class Careers extends Component
{
    public $search = '';
    public $showModal = false;
    #[Layout('layouts.guest')]

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function render()
    {   
        $jobs = Career::where('status', true)
                      ->where('title', 'like', '%' . $this->search . '%')
                      ->latest()
                      ->get();
        return view('livewire.patient-booking.menu-items.careers', [
            'jobs' => $jobs
        ]);
    }
}
