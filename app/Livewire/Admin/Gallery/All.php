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
    public function alertConfirm($id)
    {
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', galleryId: $id);
 
    }
    public function delete($id)
    {
        $gallery = GalleryImage::findOrFail($id);
        $gallery->delete();
        $this->galleries = GalleryImage::latest()->get(); 
        $this->dispatch('success', __('Gallery Deleted successfully'));
 

    }
   
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.gallery.all');
    }
}
