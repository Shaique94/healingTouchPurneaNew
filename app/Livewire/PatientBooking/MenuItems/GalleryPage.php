<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\GalleryImage;
use Livewire\Attributes\Layout;
use Livewire\Component;

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
