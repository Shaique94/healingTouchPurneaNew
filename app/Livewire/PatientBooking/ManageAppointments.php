<?php

namespace App\Livewire\PatientBooking;

use App\Jobs\SendOtpJob;
use App\Models\Appointment;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

#[Title('Manage Appointments')]
#[Layout('layouts.guest')]
class ManageAppointments extends Component
{
    #[Url(as: 'method')]
    public $searchMethod = 'phone';

    #[Url(as: 'phone')]
    public $phone = '';

    #[Url(as: 'email')]
    public $email = '';
    public $searchResults = [];
    public $noResultsFound = false;
    public $searchPerformed = false;
    public $showConfirmModal = false;
    public $appointmentToCancel = null;
    public $showDetailsModal = false;
    public $selectedAppointment = null;
    public $showOtpModal = false;
    public $otp = '';
    public $appointmentId;

    protected $rules = [
        'phone' => 'required_if:searchMethod,phone|nullable|string|max:15',
        'email' => 'required_if:searchMethod,email|nullable|email|max:255',
    ];

    protected $messages = [
        'phone.required_if' => 'Please enter a phone number.',
        'email.required_if' => 'Please enter an email address.',
        'email.email' => 'Please enter a valid email address.',
    ];

    protected function prepareForValidation($attributes)
    {
        if (isset($attributes['phone'])) {
            $attributes['phone'] = (string) $attributes['phone'];
        }
        return $attributes;
    }


    public function updatedSearchMethod()
    {
        $this->reset(['phone', 'email', 'searchResults', 'noResultsFound', 'searchPerformed']);
        $this->resetErrorBag();
    }

    #[On('appointmentCancelled')]
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
    public function triggerOtp($appointmentId)
    {

        $this->appointmentId = $appointmentId;

        $otp = rand(1000, 9999);

        // Save OTP and expiration time in the database
        Appointment::where('id', $appointmentId)->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        SendOtpJob::dispatch($appointmentId, $otp);

        $this->showOtpModal = true;


       
    }

    public function verifyOtp()
    {
        $appointment = Appointment::find($this->appointmentId);

        // Check if OTP matches and is not expired
        if ($appointment->otp === $this->otp && now()->lessThanOrEqualTo($appointment->otp_expires_at)) {

            $appointment->update(['status' => 'cancelled']);

            $this->closeOtpModal();

            $this->dispatch('appointmentCancelled', ['appointmentId' => $this->appointmentId]);

            session()->flash('message', 'Appointment cancelled successfully.');
        } else {
            $this->addError('otp', 'Invalid or expired OTP.');
        }
    }
    public function closeOtpModal()
    {
        $this->showOtpModal = false;
        $this->otp = null;
        $this->appointmentId = null;

    }

    public function downloadReceipt($appointmentId)
    {
        if (!$appointmentId) {
            session()->flash('error', 'Invalid appointment ID.');
            return;
        }

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

        $pdf = PDF::loadView('pdf.appointment', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'appointment_receipt.pdf');
    }

    public function confirmCancellation($appointmentId)
    {
        $this->appointmentToCancel = $appointmentId;
        $this->showConfirmModal = true;
    }

    public function closeConfirmModal()
    {
        $this->showConfirmModal = false;
        $this->appointmentToCancel = null;
    }

    public function cancelAppointment()
    {
        if (!$this->appointmentToCancel) {
            return;
        }

        $appointment = Appointment::find($this->appointmentToCancel);

        if (!$appointment) {
            session()->flash('error', 'Appointment not found.');
            $this->closeConfirmModal();
            return;
        }

        $appointment->update(['status' => 'cancelled']);

        // Update the status in the search results
        $this->searchResults = array_map(function ($result) {
            if ($result['id'] == $this->appointmentToCancel) {
                $result['status'] = 'cancelled';
            }
            return $result;
        }, $this->searchResults);

        session()->flash('success', 'Appointment cancelled successfully.');
        $this->closeConfirmModal();
    }

    public function showAppointmentDetails($appointmentId)
    {
        if (!$appointmentId) {
            return;
        }

        $appointment = Appointment::with([
            'patient',
            'doctor.user',
            'doctor.department',
            'payment'
        ])->find($appointmentId);

        if ($appointment) {
            $this->selectedAppointment = [
                'id' => $appointment->id,
                'reference_id' => 'HTH-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT),
                'appointment_no' => $appointment->appointment_no ?? 'N/A',
                'queue_number' => str_pad($appointment->queue_number ?? 1, 3, '0', STR_PAD_LEFT),
                'payment_status' => $appointment->payment?->status ?? 'pending',
                'paid_amount' => number_format($appointment->payment?->paid_amount ?? 0, 2),
                'patient_name' => $appointment->patient?->name ?? 'N/A',
                'patient_id' => $appointment->patient?->id ?? 'N/A',
                'patient_phone' => $appointment->patient?->phone ?? 'N/A',
                'patient_email' => $appointment->patient?->email ?? 'N/A',
                'patient_gender' => $appointment->patient?->gender ?? 'N/A',
                'doctor_name' => $appointment->doctor?->user?->name ?? 'N/A',
                'department' => $appointment->doctor?->department?->name ?? 'N/A',
                'doctor_fee' => number_format($appointment->doctor?->fee ?? 0, 2),
                'appointment_date' => $appointment->appointment_date,
                'appointment_time' => $appointment->appointment_time,
                'appointment_day' => \Carbon\Carbon::parse($appointment->appointment_date)->format('l'),
                'status' => $appointment->status ?? 'pending',
                'created_at' => $appointment->created_at,
                'barcode_path' => $appointment->barcode_path
            ];
            $this->showDetailsModal = true;
        }
    }

    public function closeDetailsModal()
    {
        $this->showDetailsModal = false;
        $this->selectedAppointment = null;
    }

    public function render()
    {
        return view('livewire.patient-booking.manage-appointments');
    }
}
