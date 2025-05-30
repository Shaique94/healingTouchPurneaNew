<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Setting;
#[Title('Terms & Conditions')]
#[Layout('layouts.guest')]
class TermsCondition extends Component
{
    public $settings = [];

    public function mount()
    {
        $this->settings = [
            'hospital_name' => Setting::get('hospital_name', 'Healing Touch Hospital'),
            'contact_email' => Setting::get('contact_email', 'info@healingtouchpurnea.com'),
            'contact_phone' => Setting::get('contact_phone', '+91 9471659700'),
            'address' => Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301'),
        ];
      
    }
    public function render()
    {
        return view('livewire.patient-booking.menu-items.terms-condition', [
            'settings' => $this->settings,
        ]);
    }
}
