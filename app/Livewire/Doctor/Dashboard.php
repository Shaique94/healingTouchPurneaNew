<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
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
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    public $days_available = [];
    public $dateFilter;
    public $search = '';
    public $doctor;


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

        $this->days_available = $doctor->available_days ?? [];
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
        
        $doctor = User::where('id', auth()->user()->id)->with('doctor')->first();
        $this->doctor_name = $doctor->name;
        // dd($doctor->id);
        $query = Appointment::with('patient')->where('doctor_id', $doctor->id);

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
