<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryImage;
use ImageKit\ImageKit;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Str;


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
        // $validatedData = $this->validate([
        //     'image' => 'required|image|max:2048',
        //     'alt' => 'required|string|max:255',
        //     'category' => 'required|string|max:100'
        // ]);

        
        //     $imagePath = $this->image->store('gallery', 'public');
            
       
        //     GalleryImage::create([
        //         'filename' => basename($imagePath),
        //         'alt' => $this->alt,
        //         'category' => $this->category
        //     ]);
        //     $this->dispatch('refresh-gallery');
        //     $this->dispatch('success', __('Gallery added successfully'));
        //     $this->closeModal();

        $validatedData = $this->validate([
            'image' => 'required|image|max:2048',
            'alt' => 'required|string|max:255',
            'category' => 'required|string|max:100'
        ]);
    
        // Temporary local file path
        $localPath = $this->image->getRealPath();
        $fileName = Str::uuid() . '.' . $this->image->getClientOriginalExtension();
    
        // Init ImageKit client
        $imagekit = new ImageKit(
            publicKey: env('IMAGEKIT_PUBLIC_KEY'),
            privateKey: env('IMAGEKIT_PRIVATE_KEY'),
            urlEndpoint: env('IMAGEKIT_URL_ENDPOINT')
        );    
    
        // Upload to ImageKit
        $uploadResponse = $imagekit->upload([
            'file' => fopen($localPath, 'r'), 
            'fileName' => $fileName,
            'folder' => '/gallery',
            'useUniqueFileName' => true,
            'tags' => [$this->category],         
        ]);


        if (isset($uploadResponse->result->name)) {
            GalleryImage::create([
                'filename' => $uploadResponse->result->name,
                'file_id' => $uploadResponse->result->fileId,
                'alt' => $this->alt,
                'category' => $this->category,
            ]);
        }
    
       

      
    }

    public function render()
    {
        return view('livewire.admin.gallery.add');
    }
}
