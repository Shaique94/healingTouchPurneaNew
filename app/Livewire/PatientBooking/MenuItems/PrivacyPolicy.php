<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

#[Title('Privacy Policy')]
#[Layout('layouts.guest')]
class PrivacyPolicy extends Component
{
    public $settings = [];
    public function mount()
    {
        $this->settings = [
            'hospital_name' => Setting::get('hospital_name', 'Healing Touch Hospital'),
            'contact_email' => Setting::get('contact_email', 'info@healingtouchpurnea.com'),
            'contact_phone' => Setting::get('contact_phone', '7079025467'),
            'address' => Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301'),
        ];
    
    }
    public function render()
    {
        return view('livewire.patient-booking.menu-items.privacy-policy' , [
            'settings' => $this->settings, 
        ]);
    }
}
