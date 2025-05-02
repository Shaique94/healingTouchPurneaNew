<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

#[Title('Doctor')]
class DoctorDetails extends Component
{
    public $doctor;
    public $doctorSlug;
    public $doctorStatus;
    public $contactPhone ; 
    public $canBookAppointment;
    

    public function mount($slug = null, $doctorStatus = true)
    {
        $this->doctor = Doctor::with(['user', 'department'])
            ->whereIn('status', ['1', '2'])
            ->where('slug', $slug)
            ->firstOrFail();
        $this->doctorSlug = $slug;
        $this->doctorStatus = $doctorStatus;
        $this->contactPhone = Setting::where('key', 'contact_phone')->value('value') ?? '9471659700';
        $this->canBookAppointment = $this->doctor->status == 1 &&
            ($this->doctor->department?->status ?? 1) != 0;
       
    }

    public function bookAppointment()
    {
        if ($this->doctorSlug) {
            return $this->redirect(route('book.appointment', ['slug' => $this->doctorSlug]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.doctor-details', [
            'doctor' => $this->doctor,
            'contact_phone' => $this->contactPhone,
        ]);
    }
}
