<?php

namespace App\Livewire\PatientBooking;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Carbon\Carbon;

class AppointmentBooking extends Component
{
    use WithFileUploads;
    
    // Step tracking
    public $currentStep = 1;
    
    // Doctor selection
    public $selectedDepartment = null;
    public $selectedDoctor = null;
    public $availableDoctors = [];
    public $departments = [];
    
    // Date selection
    public $selectedDate = null;
    public $selectedTime = null;
    public $availableTimes = [];
    
    // Patient information
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $dob;
    public $address;
    public $pincode;
    public $city;
    public $state = 'Bihar';
    public $country = 'India';
    
    // Appointment details
    public $notes;
    public $payment_method = 'cash';

    public function mount()
    {
        $this->departments = Department::all();
        $this->selectedDate = Carbon::now()->format('Y-m-d');
        $this->generateAvailableTimes();
    }
    
    public function updatedSelectedDepartment()
    {
        if ($this->selectedDepartment) {
            $this->availableDoctors = Doctor::where('department_id', $this->selectedDepartment)
                ->with(['user', 'department'])
                ->get();
        } else {
            $this->availableDoctors = [];
        }
        $this->selectedDoctor = null;
    }
    
    public function selectDoctor($doctorId)
    {
        $this->selectedDoctor = $doctorId;
        $this->updateAvailableTimes();
    }
    
    public function updatedSelectedDate()
    {
        $this->updateAvailableTimes();
    }
    
    private function updateAvailableTimes()
    {
        if ($this->selectedDoctor && $this->selectedDate) {
            $this->generateAvailableTimes();
            // Here you would normally check for existing appointments and remove booked times
            // For now, we'll just provide a list of times
        }
    }
    
    private function generateAvailableTimes()
    {
        // Generate time slots from 9 AM to 6 PM with 30-minute intervals
        $this->availableTimes = [];
        $start = 9; // 9 AM
        $end = 18; // 6 PM
        
        for ($hour = $start; $hour < $end; $hour++) {
            $this->availableTimes[] = sprintf('%02d:00', $hour);
            $this->availableTimes[] = sprintf('%02d:30', $hour);
        }
    }
    
    public function nextStep()
    {
        if ($this->currentStep === 1) {
            // Validate doctor selection
            $this->validate([
                'selectedDoctor' => 'required',
                'selectedDate' => 'required|date|date_format:Y-m-d|after_or_equal:today',
                'selectedTime' => 'required',
            ], [
                'selectedDoctor.required' => 'Please select a doctor',
                'selectedDate.after_or_equal' => 'Appointment date must be today or a future date',
                'selectedTime.required' => 'Please select an appointment time',
            ]);
        } elseif ($this->currentStep === 2) {
            // Validate patient information
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'gender' => 'required|in:male,female,other',
                'dob' => 'required|date|before:today',
                'address' => 'required|string|max:255',
                'pincode' => 'required|string|max:10',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'country' => 'required|string|max:100',
            ]);
        }
        
        $this->currentStep++;
    }
    
    public function previousStep()
    {
        $this->currentStep--;
    }
    
    public function submitForm()
    {
        // Create or find patient
        $patient = Patient::firstOrCreate(
            ['phone' => $this->phone],
            [
                'name' => $this->name,
                'email' => $this->email,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'address' => $this->address,
                'pincode' => $this->pincode,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
            ]
        );
        
        // Create appointment
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $this->selectedDoctor,
            'appointment_date' => $this->selectedDate,
            'appointment_time' => $this->selectedTime,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'notes' => $this->notes,
        ]);
        
        // Set confirmation message
        session()->flash('message', 'Your appointment has been booked successfully! Your booking reference is #' . $appointment->id);
        
        // Redirect or proceed to confirmation step
        $this->currentStep = 4; // Confirmation step
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.appointment-booking');
    }
}
