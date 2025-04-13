<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $address;
    public $pincode;
    public $city;
    public $state = "Bihar";
    public $country = "India";

    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $payment_method = "cash";
    public $notes;
    public $doctors;
    public $appointment_id;
    public $showModal = false;


     public function openModal()
     {
         $this->showModal = true;
     }
 
     public function closeModal()
     {
         $this->showModal = false;
     }
 
    #[On('update-appointment')]
    public function edit($id){
        $this->openModal();
        $appointment=Appointment::findOrFail($id);
        $this->appointment_id = $appointment->id;
        $this->name = $appointment->patient->name;
        $this->email = $appointment->patient->email;
        $this->phone = $appointment->patient->phone;
        $this->gender = $appointment->patient->gender;
        $this->address = $appointment->patient->address;
        $this->pincode = $appointment->patient->pincode;
        $this->city = $appointment->patient->city;
        $this->state = $appointment->patient->state ?? 'Bihar';
        $this->country = $appointment->patient->country ?? 'India';

        $this->doctor_id = $appointment->doctor_id;
        $this->appointment_date = $appointment->appointment_date;
        $this->appointment_time = $appointment->appointment_time;
        $this->payment_method = $appointment->payment_method;
        $this->notes = $appointment->notes;
    }
    public function mount(){
        $this->doctors=Doctor::all();
    }
    public function update(){

        $this->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone'             => 'required|string|max:20',
            'gender'            => 'nullable|in:male,female,other',
            'address'           => 'nullable|string|max:500',
            'pincode'           => 'nullable|digits:6',
            'city'              => 'nullable|string|max:100',
            'state'             => 'nullable|string|max:100',
            'country'           => 'nullable|string|max:100',
            'doctor_id'         => 'required|exists:doctors,id',
            'appointment_date'  => 'required|date|after_or_equal:today',
            'appointment_time'  => 'required',
            'payment_method'    => 'nullable|string',
            'notes'             => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::findOrFail($this->appointment_id);

        // Update Patient
        $patient = $appointment->patient;
        $patient->name = $this->name;
        $patient->email = $this->email;
        $patient->phone = $this->phone;
        $patient->gender = $this->gender;
        $patient->address = $this->address;
        $patient->pincode = $this->pincode;
        $patient->city = $this->city;
        $patient->state = $this->state;
        $patient->country = $this->country;
        $patient->save();

        $formattedTime = $this->convertTimeFormat($this->appointment_time);

        $appointment->doctor_id = $this->doctor_id;
        $appointment->appointment_date = $this->appointment_date;
        $appointment->appointment_time = $formattedTime;
        $appointment->payment_method = $this->payment_method;
        $appointment->notes = $this->notes;
        $appointment->save();

        $this->closeModal();
        $this->dispatch('refresh-appointment');
        $this->dispatch('success', __('Appointment Updated successfully'));   

    }
    private function convertTimeFormat($timeString)
    {
        try {
            // Parse the time string using Carbon
            $time = Carbon::createFromFormat('h:i A', $timeString);
            // Return the formatted time in 24-hour format without seconds
            return $time->format('H:i:00');
        } catch (\Exception $e) {
            // If parsing fails, try to work with the time as is
            return $timeString;
        }
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->gender = '';
        $this->address = '';
        $this->pincode = '';
        $this->city = '';
        $this->state = 'Bihar';
        $this->country = 'India';
        $this->doctor_id = '';
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->notes = '';
    }
    public function render()
    {
        return view('livewire.admin.appointment.update');
    }
}
