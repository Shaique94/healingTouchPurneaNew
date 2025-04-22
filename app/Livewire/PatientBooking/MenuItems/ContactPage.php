<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Setting;
use Livewire\Attributes\Title;
#[Title('Contact')]
#[Layout('layouts.guest')]
class ContactPage extends Component
{

    public $hospital_name;
    public $contact_email;
    public $contact_phone;
    public $address;
    public $instagram;
    public $facebook;
    public $twitter;
    public $map_url;
    public $map_embed_lat;
    public $map_embed_long;
    public function mount()
    {
        $this->hospital_name = Setting::get('hospital_name', 'Healing Touch');
        $this->contact_email = Setting::get('contact_email', 'info@healingtouchpurnea.com');
        $this->contact_phone = Setting::get('contact_phone', '+91 9471659700');
        $this->address = Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea');
        $this->instagram = Setting::get('instagram', '#');
        $this->facebook = Setting::get('facebook', '#');
        $this->twitter = Setting::get('twitter', '#');
        $this->map_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($this->address);
        $this->map_embed_lat = '87.4933251'; 
    $this->map_embed_long = '25.7888735';
    }
    public function render()
    {
        return view('livewire.patient-booking.menu-items.contact-page');
    }
}