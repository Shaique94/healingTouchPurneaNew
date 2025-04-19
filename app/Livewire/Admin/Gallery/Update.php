<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

class Update extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $gallery_id;
    public $image;
    public $alt;
    public $category;
    public $currentImage;

    #[On('update-gallery')]
    public function loadGallery($id)
    {
        $gallery = GalleryImage::find($id);
        if ($gallery) {
            $this->gallery_id = $gallery->id;
            $this->alt = $gallery->alt;
            $this->category = $gallery->category;
            $this->currentImage = $gallery->filename;
            $this->showModal = true;
        }
    }

    #[On('openUpdateModal')]
    public function openModal($id)
    {
        $this->showModal = true;

        $gallery = GalleryImage::find($id);
        if ($gallery) {
            $this->gallery_id = $gallery->id;
            $this->alt = $gallery->alt;
            $this->category = $gallery->category;
            $this->currentImage = $gallery->filename;
        }
    }

    public function updateGallery()
    {
        $validatedData = $this->validate([
            'alt' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|max:2048'
        ]);


        $gallery = GalleryImage::find($this->gallery_id);

        if ($this->image) {
            // Delete old image
            Storage::disk('public')->delete('gallery/' . $gallery->filename);

            // Store new image
            $imagePath = $this->image->store('gallery', 'public');
            $gallery->filename = basename($imagePath);
        }

        $gallery->alt = $this->alt;
        $gallery->category = $this->category;
        $gallery->save();
        $this->dispatch('refresh-gallery');
        $this->closeModal();
        $this->dispatch('success', __('Gallery updated successfully'));
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.gallery.update');
    }
}
