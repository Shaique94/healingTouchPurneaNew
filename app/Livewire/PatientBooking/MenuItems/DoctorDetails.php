<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Setting;
#[Title('Doctor')]
class DoctorDetails extends Component
{
    public $doctor;
    public $doctorId;
    public $doctorStatus;
    public $contactPhone ; 
    public $canBookAppointment;
    public $metaKeywords;
    public $metaDescription;
    public $hospital_name;
    public function mount($doctorId = null, $doctorStatus = true)
    {
        $this->doctor = Doctor::with(['user', 'department'])
        ->whereIn('status', ['1', '2'])
        ->findOrFail($doctorId);
        $this->doctorId = $doctorId;
        $this->doctorStatus = $doctorStatus;
        $this->contactPhone = Setting::where('key', 'contact_phone')->value('value') ?? '9471659700';
        $this->canBookAppointment = $this->doctor->status == 1 && 
            ($this->doctor->department?->status ?? 1) != 0;
            $this->hospital_name = Setting::get('hospital_name');
            $this->metaKeywords = "Dr. {$this->doctor->user->name}, {$this->doctor->qualification} specialist Purnea, book doctor appointment, best {$this->doctor->qualification} doctor Bihar";
            $this->metaDescription = "Consult with Dr. {$this->doctor->user->name}, a leading {$this->doctor->qualification} specialist at $this->hospital_name, Purnea. Book your online appointment today.";

            
    }
    public function bookAppointment()
    {
        if ($this->doctorId) {
            return $this->redirect(route('book.appointment', ['doctorId' => $this->doctorId]), navigate: true);
        }
        return $this->redirect(route('book.appointment'), navigate: true);
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.menu-items.doctor-details', [
            'contact_phone' => $this->contactPhone,
        ]);
    }
}
