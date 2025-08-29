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
    public $whatsapp_number;
    public $address;
    public $instagram_link;
    public $facebook_link; 
    public $twitter_link; 
    public $map_url;
    public $map_embed_lat;
    public $map_embed_long;

    public function mount()
    {
        $this->hospital_name = Setting::get('hospital_name', 'Healing Touch');
        $this->contact_email = Setting::get('contact_email', 'info@healingtouchpurnea.com');
        $this->contact_phone = Setting::get('contact_phone', '7079025467');
        $this->whatsapp_number = Setting::get('whatsapp_number', '7079025467');
        $this->address = Setting::get('address', 'Hope Chauraha, Rambagh Road, Linebazar, Purnea');
        $this->instagram_link = Setting::get('instagram_link', '#');
        $this->facebook_link = Setting::get('facebook_link', '#'); 
        $this->twitter_link = Setting::get('twitter_link', '#');  
        $this->map_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($this->address);
        $this->map_embed_lat = '25.7888735';
        $this->map_embed_long = '87.4933251'; 
       
    }

    public function render()
    {
        return view('livewire.patient-booking.menu-items.contact-page');
    }
}