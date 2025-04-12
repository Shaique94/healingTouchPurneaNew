<?php

namespace App\Livewire\PatientBooking;

use App\Models\Appointment;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class ManageAppointments extends Component
{
    public $searchMethod = 'phone';
    public $phone = '';
    public $email = '';
    public $searchResults = [];
    public $noResultsFound = false;
    public $searchPerformed = false;

    protected $rules = [
        'phone' => 'required_if:searchMethod,phone|nullable|string|max:15',
        'email' => 'required_if:searchMethod,email|nullable|email|max:255',
    ];

    protected $messages = [
        'phone.required_if' => 'Please enter a phone number.',
        'email.required_if' => 'Please enter an email address.',
        'email.email' => 'Please enter a valid email address.',
    ];

    public function updatedSearchMethod()
    {
        // Reset search results when changing search method
        $this->reset(['searchResults', 'noResultsFound', 'searchPerformed']);
    }

    public function findAppointments()
    {
        $this->validate();
        
        $this->searchResults = [];
        $this->noResultsFound = false;
        $this->searchPerformed = true;
        
        // Find patient by phone or email
        $patients = [];
        if ($this->searchMethod === 'phone' && !empty($this->phone)) {
            $patients = Patient::where('phone', 'like', '%' . $this->phone . '%')->get();
        } elseif ($this->searchMethod === 'email' && !empty($this->email)) {
            $patients = Patient::where('email', $this->email)->get();
        }
        
        if ($patients->count() > 0) {
            // Get appointments for each patient
            foreach ($patients as $patient) {
                $appointments = Appointment::where('patient_id', $patient->id)
                    ->with(['doctor.user', 'doctor.department'])
                    ->orderBy('appointment_date', 'desc')
                    ->get();
                
                foreach ($appointments as $appointment) {
                    $this->searchResults[] = [
                        'id' => $appointment->id,
                        'patient_name' => $patient->name,
                        'doctor_name' => $appointment->doctor->user->name,
                        'department' => $appointment->doctor->department->name,
                        'appointment_date' => $appointment->appointment_date,
                        'appointment_time' => $appointment->appointment_time,
                        'status' => $appointment->status,
                        'reference_id' => 'HTH-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT),
                    ];
                }
            }
            
            if (empty($this->searchResults)) {
                $this->noResultsFound = true;
            }
        } else {
            $this->noResultsFound = true;
        }
    }

    public function downloadReceipt($appointmentId)
    {
        $appointment = Appointment::with(['patient', 'doctor.user', 'doctor.department'])->find($appointmentId);
        
        if (!$appointment) {
            session()->flash('error', 'Appointment not found.');
            return;
        }
        
        $data = [
            'appointment' => $appointment,
            'reference' => 'HTH-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT),
            'hospital_name' => 'Healing Touch Hospital',
            'hospital_address' => 'Purnea, Bihar',
            'hospital_contact' => '+91-123-456-7890',
        ];
        
        $pdf = PDF::loadView('pdf.appointment-receipt', $data);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'appointment_receipt.pdf');
    }

    public function render()
    {
        return view('livewire.patient-booking.manage-appointments');
    }
}
