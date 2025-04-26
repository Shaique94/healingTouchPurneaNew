<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;

#[Title('Services')]
#[Layout('layouts.guest')]
class Services extends Component
{
    public $metaKeywords;
    public $metaDescription;
    public $hospital_name;

    public function mount(){
        $this->hospital_name = Setting::get('hospital_name');
        $this->metaKeywords = "hospital services Purnea, medical services Bihar, healthcare treatments, best hospital facilities Purnea";
        $this->metaDescription = "Discover a wide range of healthcare services at $this->hospital_name, Purnea. Expert medical treatments and specialist consultations under one roof.";
        
    }

    public function render()
    {
        return view('livewire.patient-booking.menu-items.services');
    }
}
