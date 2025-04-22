<?php

namespace App\Livewire\PatientBooking;

use Livewire\Component;
use App\Models\Setting;

class Header extends Component
{
    public $hospitalName;
    public $logoPath;

    public function mount()
    {
        $this->hospitalName = Setting::get('hospital_name', 'Healing Touch');
        $this->logoPath = Setting::get('logo', asset('healingTouchLogo.jpeg'));
    }

    public function render()
    {
        return view('livewire.patient-booking.header', [
            'hospitalName' => $this->hospitalName,
            'logoPath' => $this->logoPath,
        ]);
    }
}