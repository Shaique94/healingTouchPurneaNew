<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
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
    public $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    public $days_available = [];
    public $dateFilter;
    public $search = '';
    public $doctor;
    public $doctor_image;


    public function mount()
    {
        $this->dateFilter = now()->toDateString();
        $this->loadAppointments();
        $this->days_available();
    }
    #[On('refresh')]
    public function days_available()
    {
        $doctor = User::where('id', auth()->user()->id)->with('doctor')->first();
        // dd($doctor->doctor);
        $this->days_available = $doctor->doctor->available_days ?? [];
        // dd($this->days_available);
    }
    public function updatedDateFilter()
    {
        // dd("shaique");
        $this->loadAppointments();
    }
    public function updatedSearch()
    {
        $this->loadAppointments();
    }
    #[On('refresh')]
    public function loadAppointments()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $this->doctor_name = $user->name;

        $doctor = Doctor::where('user_id', $user->id)->first();
        $this->doctor_image = $doctor->image;

        $query = Appointment::with('patient')
            ->where('doctor_id', $doctor->id);

        if ($this->dateFilter) {
            $query->whereDate('appointment_date', $this->dateFilter);
        }
        
        if ($this->search) {
            $query->whereHas('patient', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $this->appointments = $query->get();

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
        // dd($available);
        $this->availabilityDays = collect($available)
            ->mapWithKeys(fn($day) => [strtolower($day) => true])
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
                ->map(fn($day) => ucfirst($day)) // Capitalize again for DB consistency
                ->toArray();

            $doctor->update([
                'available_days' => $selectedDays,
            ]);
        }

        $this->dispatch('refresh');

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
