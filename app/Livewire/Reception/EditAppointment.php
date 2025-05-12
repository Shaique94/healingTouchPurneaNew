<?php

namespace App\Livewire\Reception;

use App\Models\Appointment;
use App\Models\Doctor;
use Livewire\Component;

class EditAppointment extends Component
{
    public $editpatientModal = false;
    public $appointmentId;
    public $doctors = [];
    public $name, $email, $phone, $dob, $gender, $address, $pincode, $city, $state, $country, $doctor_id, $appointment_date, $appointment_time, $notes;

    public function mount($appointmentId)
    {
        $this->appointmentId = $appointmentId;

        $appointment = Appointment::with(['patient', 'doctor.user'])->findOrFail($appointmentId);

        $this->name = $appointment->patient->name;
        $this->email = $appointment->patient->email;
        $this->phone = $appointment->patient->phone;
        $this->dob = $appointment->patient->age;
        $this->gender = $appointment->patient->gender;
        $this->address = $appointment->patient->address;
        $this->pincode = $appointment->patient->pincode;
        $this->city = $appointment->patient->city;
        $this->state = $appointment->patient->state;
        $this->country = $appointment->patient->country;
        $this->doctor_id = $appointment->doctor_id;
        $this->appointment_date = $appointment->appointment_date;
        $this->appointment_time = $appointment->appointment_time;
        $this->notes = $appointment->notes;

        $this->doctors = Doctor::with('user')->get();
    }

    public function save()
    {
        // dd("shaique");
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:255',
        ]);
// dd("shaique");
        $appointment = Appointment::findOrFail($this->appointmentId);
// dd($appointment);
        // Update patient
        $patient = $appointment->patient;
        // dd($patient);
        $patient->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'age' => $this->dob,
            'gender' => $this->gender,
            'address' => $this->address,
            'pincode' => $this->pincode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'notes' => $this->notes,  
        ]);

        // Update appointment
        $appointment->update([
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'notes' => $this->notes,
        ]);

        // Close the modal after save
        $this->dispatch('closeEditModal');
        $this->dispatch('appointmentBooked');
        $this->dispatch('notice', type: 'info', text: 'Appointment updated successfully');
    }

    public function render()
    {
        return view('livewire.reception.edit-appointment');
    }

    public function cancel()
    {
        $this->dispatch('closeEditModal');
    }

    public function editAppointment($appointmemtId)
    {

        $this->editpatientModal = true;
    }
}
