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
   
    public $images;
    public function mount(){
       
        $this->images = GalleryImage::all();
       
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.gallery-page');
    }
}
