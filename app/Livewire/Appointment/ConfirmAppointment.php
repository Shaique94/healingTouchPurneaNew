<?php

namespace App\Livewire\Appointment;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ConfirmAppointment extends Component
{
    public $patient;
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $notes;
    public $payment_method = 'cash';

    public function mount(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function save()
    {
        $this->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'patient_id' => $this->patient->id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'notes' => $this->notes,
            'payment_method' => $this->payment_method,
            'created_by' => Auth::id(),
        ]);

        session()->flash('success', 'Appointment booked successfully!');
        return redirect()->route('appointments.create');
    }
    #[Layout('layouts.app')] 

    public function render()
    {
        return view('livewire.appointment.confirm-appointment',[
            'doctors' => Doctor::with('user')->get()
        ]);
    }
}
