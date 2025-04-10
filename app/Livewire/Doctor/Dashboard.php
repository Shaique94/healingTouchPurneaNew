<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $appointments;
    public $appointments_count;
    public $appointments_completed;
    public $appointments_upcoming;
    public $appointments_cancelled;
    public $doctor_name;
    public $showSettingsModal = false;
    public array $availabilityDays = [];
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];


    public function mount()
    {
        $this->loadAppointments();
    }

    #[On('refresh')]
    public function loadAppointments()
    {
        $this->doctor_name = auth()->user()->name;
        $this->appointments = Appointment::where('doctor_id', auth()->user()->id)->whereDate('appointment_date', Carbon::today())->get();
        $this->appointments_count = $this->appointments->count();
        $this->appointments_completed = $this->appointments->where('status', 'confirmed')->count();
        $this->appointments_upcoming = $this->appointments->where('status', 'pending')->count();
        $this->appointments_cancelled = $this->appointments->where('status', 'cancelled')->count();
    }
    public function openAvailablityModal()
    {
        // Fetch current availability from DB if needed
        $this->showSettingsModal = true;

        $available = auth()->user()->doctor->available_days ?? [];
    
        $this->availabilityDays = collect($available)
            ->mapWithKeys(fn($day) => [$day => true])
            ->toArray();
    }
    public function closeSettingsModal()
    {
        $this->showSettingsModal = false;
    }
    public function saveAvailability()
    {
        $doctor = auth()->user()->doctor;

        if ($doctor) {
            $selectedDays = collect($this->availabilityDays)
            ->filter() 
            ->keys()   
            ->toArray();

        $doctor->update([
            'available_days' => $selectedDays,
        ]);
        }

        session()->flash('message', 'Availability updated successfully.');
        $this->showSettingsModal = false;
    }
    public function markAsCompleted($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'confirmed';
        $appointment->save();

        $this->dispatch('refresh');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('doctor.login');
    }
    #[Layout('layouts.doctor')]

    public function render()
    {
        return view('livewire.doctor.dashboard');
    }
}
