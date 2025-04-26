<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('About Us')]
class AboutUs extends Component
{
    public $metaKeywords;
    public $metaDescription;
    public $hospital_name;

    public function mount(){
        $this->hospital_name = Setting::get('hospital_name');
        $this->metaKeywords = "$this->hospital_name, about hospital Purnea, best healthcare team, hospital mission Purnea, trusted medical care";
        $this->metaDescription = "Learn about $this->hospital_name - our journey, our vision, and our commitment to providing exceptional healthcare services in Purnea.";
        
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.about-us');
    }
}
