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
    public $city = "purnea";
    public $state = 'Bihar';
    public $country = 'India';
    public $notes;
    public $payment_method = 'cash';

    public function mount()
    {
        $this->appointmentDate = Carbon::now()->format('Y-m-d');
        $this->generateTimeSlots();
    }
  

    public function updated($property)
    {
        $rules = [];

        if ($this->step === 1) {
            $rules = [
                'selectedDoctor' => 'required',
                'appointmentDate' => 'required|date|after_or_equal:today',
                'appointmentTime' => 'required',
            ];
        } elseif ($this->step === 2) {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:10',
                'gender' => 'required|in:male,female,other',
                'dob' => 'nullable',
                'address' => 'required|string|max:255',
                'pincode' => 'required|string|max:10',
                'city' => 'required|string|max:100',
            ];
        }

        $this->validateOnly($property, $rules);
    }



    // When department is changed, reset doctor selection
    public function updatedSelectedDepartment()
    {
        $this->selectedDoctor = null;
        $this->doctorDetails = null;
        $this->generateTimeSlots();
    }

    // Function to handle tab selection for date
    public function selectDateTab($tab)
    {
        if ($tab == 'today') {
            $this->appointmentDate = Carbon::now()->format('Y-m-d');
        } else {
            $this->appointmentDate = Carbon::now()->addDay()->format('Y-m-d');
        }

        $this->appointmentTime = null; // Reset selected time when changing date
        $this->generateTimeSlots();
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
        $this->appointmentTime = null; // Reset selected time
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
        $this->availableTimes = [];

        if (!$this->selectedDoctor || !$this->appointmentDate) {
            return;
        }
        $doctor = Doctor::find($this->selectedDoctor);
        if (!$doctor) {
            return;
        }
        // Check if the doctor is available on the selected date
        $selectedDate = Carbon::parse($this->appointmentDate);
        $dayofWeek = $selectedDate->format('l');
        $availableDays = is_array($doctor->available_days) ? $doctor->available_days : [];
        if (!in_array($dayofWeek, $availableDays)) {
            $this->dispatch('doctor-not-available', [
                'message' => "This doctor is not available on {$selectedDate->format('l, d M Y')}. Please choose another doctor or date."
            ]);
            return;
        }
        // Set start and end hours (10am to 6pm)
        $startHour = 10;
        $endHour = 18;   // 6 PM

        // Generate time slots at 30-minute intervals
        $timeSlots = [];
        for ($hour = $startHour; $hour < $endHour; $hour++) {
            $formattedHour = $hour <= 12 ? $hour : $hour - 12;
            $ampm = $hour < 12 ? 'AM' : 'PM';

            // Add the hour (e.g., "10:00 AM")
            $timeSlots[] = sprintf('%d:00 %s', $formattedHour, $ampm);

            // Add the half hour (e.g., "10:30 AM")
            if ($hour <= $endHour) { // Don't add 6:30 PM
                $timeSlots[] = sprintf('%d:30 %s', $formattedHour, $ampm);
            }
        }

        // If today, filter out past time slots
        if ($this->appointmentDate == Carbon::now()->format('Y-m-d')) {
            // Get current time with correct timezone
            $currentTime = Carbon::now('Asia/Kolkata');
            
            // Filter time slots more explicitly for debugging
            $filteredTimeSlots = [];
            
            foreach ($timeSlots as $timeSlot) {
                // Create a datetime object for this slot using today's date
                $slotTime = Carbon::createFromFormat(
                    'g:i A', 
                    $timeSlot, 
                    'Asia/Kolkata'
                );
                
                // Set the date part to today
                $slotTime->setDate(
                    $currentTime->year,
                    $currentTime->month,
                    $currentTime->day
                );
                
                // Add 30 minutes buffer from now
                $bufferTime = $currentTime->copy()->addMinutes(30);
                
                // Only keep slots that are at least 30 minutes in the future
                if ($slotTime->greaterThanOrEqualTo($bufferTime)) {
                    $filteredTimeSlots[] = $timeSlot;
                }
            }
            
            $timeSlots = $filteredTimeSlots;
        }

        // Filter out booked slots
        $bookedSlots = Appointment::where('doctor_id', $this->selectedDoctor)
            ->where('appointment_date', $this->appointmentDate)
            ->get()
            ->map(function ($appointment) {
                // Convert database time (HH:MM:SS) to display format (h:MM AM/PM)
                try {
                    return Carbon::parse($appointment->appointment_time)->format('g:i A');
                } catch (\Exception $e) {
                    return $appointment->appointment_time;
                }
            })
            ->toArray();

        $this->availableTimes = array_values(array_diff($timeSlots, $bookedSlots));
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
                'dob' => 'nullable|max:150',
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

        // Convert the time format from "10:00 AM" to MySQL time format "10:00:00"
        $formattedTime = $this->convertTimeFormat($this->appointmentTime);

        // Create the appointment
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $this->selectedDoctor,
            'appointment_date' => $this->appointmentDate,
            'appointment_time' => $formattedTime, // Use the converted time format
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

    // Helper function to convert time format from "10:00 AM" to "10:00:00"
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

    public function downloadReceipt()
    {
        $doctor = Doctor::find($this->selectedDoctor);
    
        $appointment = Appointment::with(['doctor', 'patient'])
            ->where('id', $this->appointmentId)
            ->first();
    
        $pdf = Pdf::loadView('pdf.appointment', compact('appointment'))
                  ->setPaper('a4');  // Set A4 paper size
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();  // Output raw PDF data for download
        }, 'appointment-receipt.pdf');
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
