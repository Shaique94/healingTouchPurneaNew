<?php

namespace App\Livewire\Reception;

use App\Jobs\SendTomorrowAppointmentsPDF;
use App\Mail\AppointmentReceiptMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient as PatientModel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $appointments;
    public $appointments_count;
    public $appointments_checked_in;
    public $appointments_cancelled;
    public $selectedDate = 'tomorrow';
    public $search = '';
    public $showModal = false;
    public $doctors;
    public $name, $email, $phone, $dob, $gender, $address, $pincode, $city, $state = "Bihar", $country = "India";
    public $doctor_id, $appointment_date, $appointment_time, $notes;
    public $step = 1;
    public $appointmentId;
    public $doctor_name;
    public $selectedDoctorId;
    public $editpatientModal = false;
    public $amount;
    public $settlement = true;





    public function mount()
    {

        $this->loadAppointments();
        $this->doctors = Doctor::with('user')->get();
    }
    public function nextStep()
    {
        // dd('shaique');
        if ($this->step == 1) {
            $this->validate([
                'name' => 'required|string',
                'email' => 'nullable|email',
                'phone' => ['required', 'digits:10'],
                'dob' => 'required|numeric|between:0,150',
                'gender' => 'required',
                'address' => 'required',
                'pincode' => 'nullable',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
            ]);
        }
        if ($this->step == 2) {
            $this->validate([
                'doctor_id' => 'required|exists:doctors,id',
                'appointment_date' => 'required|date',
                'appointment_time' => 'required',
                'notes' => 'nullable|string',
                'amount' => 'required|numeric|min:0',
                'settlement' => 'boolean',
            ]);
            // dd($this->doctor_id);
            $doctor_name = Doctor::where('id', $this->doctor_id)->first();
            // dd($doctor_name);
            $this->doctor_name = $doctor_name->user->name;
        }
        // dd('shaique');
        $this->step++;
    }
    public function confirmCollect($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $pendingAmount = $appointment->doctor->fee - $appointment->payment->paid_amount; // or calculate how much is due
        // dd($pendingAmount);

        $this->dispatch('show-collect-confirmation', [
            'appointmentId' => $appointmentId,
            'pendingAmount' => $pendingAmount
        ]);
    }
    #[On('collectNow')]
    public function collectNow($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->payment->update([
            'paid_amount' => $appointment->doctor->fee,
            'status' => 'paid',
            'settlement' => true,
        ]);

        $this->dispatch('payment-collected-success');
    }

    public function updatedDoctorId($value)
    {
        logger('Selected doctor ID:', ['doctor_id' => $value]);
        $doctor = Doctor::find($value);
        if ($doctor) {
            $this->amount = $doctor->fee;
            logger('Doctor fee set to:', ['fee' => $doctor->fee]);
        } else {
            $this->amount = null;
            logger('No doctor found for ID:', [$value]);
        }
    }

    public function editAppointment($appointmentId)
    {
        $this->editpatientModal = true;
        $this->appointmentId = $appointmentId;
    }

    #[On("closeEditModal")]
    public function closeEditModal()
    {
        $this->editpatientModal = false;
    }

    public function backStep()
    {
        $this->step--;
    }

    public function downloadTomorrowAppointmentsPDF()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        if (empty($this->selectedDoctorId)) {
            $appointments = Appointment::with(['patient', 'doctor.user'])
                ->whereDate('appointment_date', $tomorrow)
                ->get();
        } else {
            // If a doctor is selected, fetch appointments for that specific doctor
            $appointments = Appointment::with(['patient', 'doctor.user'])
                ->whereDate('appointment_date', $tomorrow)
                ->where('doctor_id', $this->selectedDoctorId)
                ->get();
            // dd($appointments->doctor->user->email);
            // Send email to the doctor with PDF attachment
            if ($this->selectedDoctorId && $appointments->isNotEmpty()) {
                $doctor = Doctor::find($this->selectedDoctorId);
                $doctorEmail = $doctor->user->email;
                $data = [
                    'appointments' => $appointments,
                    'doctor_name' => $doctor->user->name,
                    'date' => Carbon::tomorrow()->format('d-m-Y'),
                ];
                $pdf = Pdf::loadView('pdf.tomorrow-appointments', $data);
                //dispatching job here to send mail
                SendTomorrowAppointmentsPDF::dispatch($this->selectedDoctorId);
            }
        }

        $pdf = Pdf::loadView('pdf.tomorrow-appointments', compact('appointments'));
        // Send email to the doctor with PDF attachment


        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'tomorrow-appointments.pdf');
    }

    public function save()
    {
        $data=$this->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'amount' => 'required|numeric|min:0',
            'settlement' => 'boolean',
            'notes' => 'nullable|string|max:255',
        ]);


        $existingPatient = PatientModel::where('name', $this->name)
            ->where('phone', $this->phone)
            ->first();

        if ($existingPatient) {
            $hasAppointmentToday = Appointment::where('patient_id', $existingPatient->id)
                ->where('appointment_date', $this->appointment_date)
                ->exists();

            if ($hasAppointmentToday) {
            $this->dispatch('notice', type: 'info', text: 'This patient already has an appointment on '. $this->appointment_date);
            return;
            }

        } else {
            $patient = PatientModel::create([
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
            ]);
             $lastQueueNumber = Appointment::where('doctor_id', $this->doctor_id)
            ->where('appointment_date', $this->appointment_date)
            ->orderBy('queue_number', 'desc')
            ->value('queue_number');

        $queueNumber = $lastQueueNumber ? $lastQueueNumber + 1 : 1;

        $new_appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'queue_number' => $queueNumber,
            'status' => 'checked_in',
            'notes' => $this->notes,
            'created_by' => auth()->id(),
        ]);

        $datePrefix = Carbon::parse($this->appointment_date)->format('Ymd');
        $new_appointment->update([
            'appointment_no' => intval($datePrefix . str_pad($new_appointment->id, 4, '0', STR_PAD_LEFT))
        ]);

        $new_appointment->payment()->create([
            'appointment_id' => $new_appointment->id,
            'paid_amount' => $this->amount,
            'mode' => 'Cash',
            'settlement' => $this->settlement,
            'status' => $this->settlement ? 'paid' : 'due',
        ]);

        $this->appointmentId = $new_appointment->id;
        $this->showModal = true;
        $this->loadAppointments();
        $this->step++;
        session()->flash('success', value: 'Patient and appointment created successfully.');
        }


        
    }

    public function viewAppointment($appointmentId)
    {

        try {
            $appointment = Appointment::with(['doctor', 'patient'])
                ->where('id', $appointmentId)
                ->firstOrFail();

            $pdf = Pdf::loadView('pdf.appointment', compact('appointment'))
                ->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'appointment-receipt.pdf');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error('Appointment not found: ' . $id);
            session()->flash('error', 'Appointment not found.');
            return null;
        } catch (\Exception $e) {
            \Log::error('PDF generation failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to generate PDF. Please try again.');
            return null;
        }
    }
    public function updatedPincode($value)
    {
        if (strlen($value) == 6) {
            try {
                $response = Http::get("https://api.postalpincode.in/pincode/{$value}");
                $data = $response->json();

                if (!empty($data[0]['PostOffice']) && $data[0]['Status'] === 'Success') {
                    $postOffice = $data[0]['PostOffice'][0];
                    $this->city = $postOffice['District'] ?? '';
                    $this->state = $postOffice['State'] ?? '';
                    $this->country = $postOffice['Country'] ?? '';
                } else {
                    $this->city = $this->state = $this->country = '';
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Error fetching location. Try again later.');
            }
        } else {
            $this->city = $this->state = $this->country = '';
        }
    }

    public function updatedSelectedDate()
    {
        $this->loadAppointments();
    }
    public function updatedSearch()
    {
        $this->loadAppointments();
    }
    public function openModal()
    {
        $this->showModal = true;
        // $this->doctors = User::where('role', 'doctor')->get();
        $this->doctors = Doctor::with('user')->get();
    }
    public function filterByDate($date)
    {
        $this->selectedDate = $date;
        $this->loadAppointments();
    }

    #[On('appointmentBooked')]
    public function loadAppointments()
    {
        $query = Appointment::with('patient');

        // Filter by date
        if ($this->selectedDate === 'tomorrow') {
            $date = now()->addDay();
        } else {
            // Handle custom date from date picker
            try {
                $date = \Carbon\Carbon::parse($this->selectedDate);
            } catch (\Exception $e) {
                $date = now()->addDay();
            }
        }

        $query->whereDate('appointment_date', $date->toDateString());

        if (!empty($this->search)) {
            $query->whereHas('patient', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }

        $this->appointments = $query->get();

        $this->appointments_count = $this->appointments->count();
        $this->appointments_checked_in = $this->appointments->where('status', 'checked_in')->count();
        $this->appointments_cancelled = $this->appointments->where('status', 'cancelled')->count();
    }

    // public function checkIn($appointmentId)
    // {
    //     $appointment = Appointment::find($appointmentId);
    //     if ($appointment) {
    //         $appointment->status = 'checked_in';
    //         $appointment->save();
    //         $this->loadAppointments();
    //     }
    //     $this->dispatch('alert', [
    //         'type' => 'success',
    //         'message' => 'Appointment checked in successfully.'
    //     ]);

    // }
    public function confirmCheckIn($appointmentId)
    {

        // dd($appointmentId);
        $this->dispatch('confirm-check-in', [
            'appointmentId' => $appointmentId,
        ]);
    }
    #[On('doCheckIn')]
    public function doCheckIn($appointmentId)
    {
        // dd($appointmentId);
        if (!$appointmentId) {
            // maybe throw error or return
            return;
        }

        $appointment = Appointment::find($appointmentId);
        if ($appointment) {
            $appointment->status = 'checked_in';
            $appointment->save();
            $this->loadAppointments();
        }

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Patient checked in successfully.'
        ]);
    }
    public  function cancelAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);
        if ($appointment) {
            $appointment->status = 'cancelled';
            $appointment->save();
            $this->loadAppointments();
        }
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Appoinement Cancelled successfully'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('reception.login');
    }
    #[Layout('layouts.reception')]
    public function render()
    {
        return view('livewire.reception.dashboard');
    }
}
