<?php

namespace App\Livewire\PatientBooking\MenuItems;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Career;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('Jobs')]
class Careers extends Component
{
    public $search = '';
    public $showModal = false;
    public $metaKeywords;
    public $metaDescription;
    public $hospital_name;

    public function mount(){
        $this->hospital_name = Setting::get('hospital_name');
        $this->metaKeywords = "hospital jobs Purnea, medical careers Bihar, healthcare job openings, work at $this->hospital_name";
        $this->metaDescription = "Explore exciting career opportunities at $this->hospital_name, Purnea. Join our team of healthcare professionals and grow your career.";
        
    }
    #[Layout('layouts.guest')]

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function render()
    {   
        $jobs = Career::where('status', true)
                      ->where('title', 'like', '%' . $this->search . '%')
                      ->latest()
                      ->get();
        return view('livewire.patient-booking.menu-items.careers', [
            'jobs' => $jobs
        ]);
    }
}
