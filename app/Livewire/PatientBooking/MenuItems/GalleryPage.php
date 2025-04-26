<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\GalleryImage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('Gallery')]
class GalleryPage extends Component
{
    public $metaKeywords;
    public $metaDescription;
    public $hospital_name;

    
    public $images;
    public function mount(){
        $this->hospital_name = Setting::get('hospital_name');

        $this->images = GalleryImage::all();
        $this->metaKeywords = "$this->hospital_name gallery, hospital facilities Purnea, healthcare infrastructure, modern hospital photos";
        $this->metaDescription = "Explore the advanced facilities and infrastructure of $this->hospital_name, Purnea, through our gallery showcasing our commitment to quality care.";
        
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.gallery-page');
    }
}
