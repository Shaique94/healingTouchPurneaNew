<?php

namespace App\Livewire\Reception;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $appointments;
    public $appointments_count;
    public $appointments_checked_in;
    public $appointments_cancelled;
    public $selectedDate = 'today';
    public $search = '';

    public function mount()
    {
        $this->loadAppointments();
    }
    public function updatedSearch()
    {
        $this->loadAppointments();
    }
    public function filterByDate($date)
    {
        $this->selectedDate = $date;
        
        $this->loadAppointments();
    }
    
    public function loadAppointments()
    {
        $query = Appointment::with('patient');
    
        // Filter by date
        $date = now();
        if ($this->selectedDate === 'tomorrow') {
            $date = $date->addDay();
        }
        $query->whereDate('appointment_date', $date->toDateString());
    
        // Filter by search
        if (!empty($this->search)) {
            $query->whereHas('patient', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }
    
        $this->appointments = $query->get();
    
        $this->appointments_count = $this->appointments->count();
        $this->appointments_checked_in = $this->appointments->where('status', 'checked_in')->count();
        $this->appointments_cancelled = $this->appointments->where('status', 'cancelled')->count();
    }
    
    public function checkIn($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);
        if ($appointment) {
            $appointment->status = 'checked_in';
            $appointment->save();
            $this->loadAppointments();
        }
    }
    public  function cancelAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);
        if ($appointment) {
            $appointment->status = 'cancelled';
            $appointment->save();
            $this->loadAppointments();
        }
    }
    #[Layout('layouts.reception')]
    public function render()
    {
        return view('livewire.reception.dashboard');
    }
}
