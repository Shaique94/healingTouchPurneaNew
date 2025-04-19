<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryImage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public $galleries;

    #[On('refresh-gallery')]
    public function mount()
    {
        $this->galleries = GalleryImage::latest()->get();
    }

    public function delete($id)
    {
        $gallery = GalleryImage::findOrFail($id);
        $gallery->delete();
        $this->galleries = GalleryImage::latest()->get();  

        session()->flash('message', 'Gallery item deleted successfully.');
    }
   
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.gallery.all');
    }
}
