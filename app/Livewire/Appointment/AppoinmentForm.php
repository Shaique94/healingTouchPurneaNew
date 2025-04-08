<?php

namespace App\Livewire\Appointment;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AppoinmentForm extends Component
{  

    public $name, $email, $phone, $dob, $gender, $address;
    public $pincode, $city, $state, $country;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:patients,email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ];
    }

    public function save()
    {
        $this->validate();

        $patient = Patient::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'address' => $this->address,
            'pincode' => $this->pincode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
        ]);

        session()->flash('success', 'Patient created successfully!');

        return redirect()->route('appointments.book', $patient->id);
    }
    #[Layout('layouts.app')] 
    public function render()
    {
        return view('livewire.appointment.appoinment-form');
    }
}
