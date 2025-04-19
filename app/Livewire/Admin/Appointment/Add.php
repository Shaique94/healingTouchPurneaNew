<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Add extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $address;
    public $pincode;
    public $city;
    public $state ;
    public $country = "India";
    public $age;
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $payment_method = "cash";
    public $notes;
    public $doctors;

    public function mount()
    {
        $this->doctors = Doctor::all();
    }
  
    public function UpdatedPincode()
    {
        if (!empty($this->pincode) && strlen($this->pincode) == 6) {
            try {
                $response = Http::get('https://api.postalpincode.in/pincode/' . $this->pincode);
                $data = $response->json();

                if (isset($data[0]['Status']) && $data[0]['Status'] === 'Success') {
                    $postOffice = $data[0]['PostOffice'][0];
                    $this->city = $postOffice['Block'] ?: $postOffice['Name'];
                    $this->state = $postOffice['State'];
                    $this->country = 'India';
                    $this->dispatch('pincode-fetched', ['success' => true]);
                } else {
                    $this->dispatch('pincode-fetched', ['success' => false, 'message' => 'Invalid pincode']);
                }
            } catch (\Exception $e) {
                $this->dispatch('pincode-fetched', ['success' => false, 'message' => 'Could not fetch location data']);
            }
        }
    }
    public function save()
    {
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
            'notes'             => 'nullable|string|max:500',
            'age'               => 'nullable|integer|min:0|max:150',
        ]);
        $patient = Patient::firstOrCreate(
            ['phone' => $this->phone],
            [
                'name' => $this->name,
                'email' => $this->email,
                'gender' => $this->gender,
                'address' => $this->address,
                'pincode' => $this->pincode,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'age' => $this->age,
            ]
        );

        $formattedTime = $this->convertTimeFormat($this->appointment_time);

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $formattedTime,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'notes' => $this->notes,
            'created_by' => Auth::id()
        ]);
        $this->dispatch('refresh-appointment');
        $this->resetForm();
        $this->dispatch('success', __('Appointment Booked successfully'));
        $this->redirect('/admin/appointment', navigate: true);
    }
    private function convertTimeFormat($timeString)
    {
        try {
            // Parse the time string using Carbon
            $time = Carbon::createFromFormat('h:i A', $timeString);
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
        $this->state = '';
        $this->country = 'India';
        $this->doctor_id = '';
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->notes = '';
        $this->age = '';
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.appointment.add');
    }
}
