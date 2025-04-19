<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Add extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $image;
    public $alt;
    public $category;
    public $gallery_id;

    #[On('openModal')]
    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['image', 'alt', 'category', 'gallery_id']);
    }

    public function saveGalleryImage()
    {
        $validatedData = $this->validate([
            'image' => 'required|image|max:2048',
            'alt' => 'required|string|max:255',
            'category' => 'required|string|max:100'
        ]);

        
            $imagePath = $this->image->store('gallery', 'public');
            
       
            GalleryImage::create([
                'filename' => basename($imagePath),
                'alt' => $this->alt,
                'category' => $this->category
            ]);
            $this->dispatch('refresh-gallery');
            $this->dispatch('success', __('Gallery added successfully'));
            $this->closeModal();

      
    }

    public function render()
    {
        return view('livewire.admin.gallery.add');
    }
}
