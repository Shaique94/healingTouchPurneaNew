<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\GalleryImage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
use ImageKit\ImageKit;

#[Title('Gallery')]
class GalleryPage extends Component
{
   
    public $images;
    public function mount(){
        
        // $this->images = GalleryImage::all();

        $imagekit = new ImageKit(
            publicKey: env('IMAGEKIT_PUBLIC_KEY'),
            privateKey: env('IMAGEKIT_PRIVATE_KEY'),
            urlEndpoint: env('IMAGEKIT_URL_ENDPOINT')
        );
    
        $response = $imagekit->listFiles([
            'path' => '/gallery',
            'limit' => 20, 
            'sort' => 'DESC_CREATED',
        ]);
    
        if (isset($response->result)) {
            $this->images = collect($response->result)->map(function ($img) {
                return [
                    'url' => $img->url,
                    'thumbnail' => $img->url . '?tr=w-300,h-200,c-maintain_ratio,f-auto,q-80',
                    'name' => $img->name,
                ];
            })->toArray();
        } else {
            $this->images = [];
        }
       
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.gallery-page');
    }
}
