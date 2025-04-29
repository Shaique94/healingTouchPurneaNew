<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryImage;
use ImageKit\ImageKit;
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
        $this->dispatch('swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', galleryId: $id);
    }
    public function delete($id)
    {
        $gallery = GalleryImage::findOrFail($id);

        // Delete from ImageKit if file_id is available
        if ($gallery->file_id) {
            $imagekit = new ImageKit(
                publicKey: env('IMAGEKIT_PUBLIC_KEY'),
                privateKey: env('IMAGEKIT_PRIVATE_KEY'),
                urlEndpoint: env('IMAGEKIT_URL_ENDPOINT')
            );

            $imagekit->deleteFile($gallery->file_id);
        }

        // Delete from DB
        $gallery->delete();

        // Refresh gallery list
        $this->galleries = GalleryImage::latest()->get();

        $this->dispatch('success', __('Gallery Deleted successfully'));
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.gallery.all');
    }
}
