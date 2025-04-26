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
    public $metaKeywords;
    public $metaDescription;
    public $settings = [];

    public function mount()
    {
        $this->settings = [
            'hospital_name' => Setting::get('hospital_name', 'Healing Touch Hospital'),
            'contact_email' => Setting::get('contact_email', 'info@healingtouchpurnea.com'),
            'contact_phone' => Setting::get('contact_phone', '+91 9471659700'),
            'address' => Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301'),
        ];
        $this->metaKeywords = "$this->hospital_name terms, hospital service terms, $this->hospital_name hospital conditions, hospital policies, service usage rules";
$this->metaDescription = "Read the terms and conditions for using services at $this->hospital_name, Purnea. Understand your rights and responsibilities clearly.";

    }
    public function render()
    {
        return view('livewire.patient-booking.menu-items.terms-condition', [
            'settings' => $this->settings,
        ]);
    }
}
