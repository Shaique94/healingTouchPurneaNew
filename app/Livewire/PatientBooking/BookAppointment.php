<?php

namespace App\Livewire\PatientBooking;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Department;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Carbon\Carbon;
use Livewire\Attributes\On;

class BookAppointment extends Component
{
    // Current step in booking process
    public $step = 1;

    // Doctor & Department selection
    public $selectedDepartment = null;
    public $selectedDoctor = null;
    public $appointmentId;
    public $doctorDetails = null;

    // Appointment details
    public $appointmentDate = null;
    public $appointmentTime = null;
    public $availableTimes = [];

    // Patient details
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $dob;
    public $address;
    public $pincode;
    public $city="purnea";
    public $state = 'Bihar';
    public $country = 'India';
    public $notes;
    public $payment_method = 'cash';

    public function mount()
    {
        $this->appointmentDate = Carbon::now()->format('Y-m-d');
        $this->generateTimeSlots();
    }

    // When department is changed, reset doctor selection
    public function updatedSelectedDepartment()
    {
        $this->selectedDoctor = null;
        $this->doctorDetails = null;
    }

    // When appointment date is changed, regenerate time slots
    public function updatedAppointmentDate()
    {
        $this->generateTimeSlots();
    }

    // When doctor is selected, fetch doctor details
    public function selectDoctor($doctorId)
    {
        $this->selectedDoctor = $doctorId;
        $this->getDoctorDetails();
        $this->generateTimeSlots();
    }

    // Get city and state from pincode - optimized
    public function fetchLocationByPincode()
    {
        if (strlen($this->pincode) == 6) {
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

    // Get detailed information about the selected doctor
    protected function getDoctorDetails()
    {
        if ($this->selectedDoctor) {
            $this->doctorDetails = Doctor::with(['user', 'department'])
                ->find($this->selectedDoctor);
        }
    }

    // Generate available time slots
    protected function generateTimeSlots()
    {
        // Generate time slots from 9am to 6pm at 30-minute intervals
        $this->availableTimes = [];
        $startHour = 9;  // 9 AM
        $endHour = 18;   // 6 PM

        for ($hour = $startHour; $hour < $endHour; $hour++) {
            $this->availableTimes[] = sprintf('%02d:00', $hour);
            $this->availableTimes[] = sprintf('%02d:30', $hour);
        }

        // In a real application, you would check the doctor's availability
        // and remove already booked slots here
    }

    // Proceed to next step
    public function nextStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'selectedDoctor' => 'required',
                'appointmentDate' => 'required|date|after_or_equal:today',
                'appointmentTime' => 'required',
            ], [
                'selectedDoctor.required' => 'Please select a doctor to continue.',
                'appointmentDate.after_or_equal' => 'Please select today or a future date.',
                'appointmentTime.required' => 'Please select an appointment time.',
            ]);
        } elseif ($this->step === 2) {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:15',
                'gender' => 'required|in:male,female,other',
                'dob' => 'nullable|date|before:today',
                'address' => 'required|string|max:255',
                'pincode' => 'required|string|max:10',
                'city' => 'required|string|max:100',
            ]);
        }

        $this->step++;
        
        // Emit event for step change to manage loader
        $this->dispatch('stepChanged', ['step' => $this->step]);
    }

    // Go back to previous step
    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
            
            // Emit event for step change
            $this->dispatch('stepChanged', ['step' => $this->step]);
        }
    }

    public function DoctorNotAvailable()
    {
        session()->flash('error', 'Doctor is not available for the Appointment.');
    }

    // Submit the appointment booking - with loading state
    public function bookAppointment()
    {
        // First, create or find the patient
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

        // Create the appointment
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $this->selectedDoctor,
            'appointment_date' => $this->appointmentDate,
            'appointment_time' => $this->appointmentTime,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'notes' => $this->notes,
        ]);
        
        $this->appointmentId = $appointment->id;

        session()->flash('message', 'Your appointment has been booked successfully!');
        session()->flash('appointment_id', $appointment->id);

        // Move to confirmation page
        $this->step = 4;
        $this->dispatch('stepChanged', ['step' => $this->step]);
        
        // Small delay to improve user experience
        usleep(500000); // 0.5 seconds
    }

    public function downloadReceipt()
    {
        $doctor = Doctor::find($this->selectedDoctor);


        $appointment = [
            'id' => $this->appointmentId,
            'doctor' => $this->doctor->user->name ?? '',
            'speciality' => $this->doctor->department->name ?? '',
            'date' => $this->appointmentDate . ' ' . $this->appointmentTime,
            'patient' => $this->name ?? '',
            'phone' => $this->phone ?? '',
            'gender' => $this->gender ?? '',
            'fee' => 500,
            'location' => 'Healing Touch Hospital, Purnea'
        ];

        $pdf = Pdf::loadView('pdf.appointment', compact('appointment'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'appointment.pdf');
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.patient-booking.book-appointment', [
            'departments' => Department::where('status', 0)->orderBy('name', 'desc')->get(),
            'doctors' => $this->selectedDepartment
                ? Doctor::where('department_id', $this->selectedDepartment)->with(['user', 'department'])->get()
                : Doctor::with(['user', 'department'])->get(),
        ]);
    }
}
