<?php

namespace App\Jobs;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Mail\AppointmentReceiptMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;


class SendTomorrowAppointmentsPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $selectedDoctorId;

    public function __construct($selectedDoctorId = null)
    {
        $this->selectedDoctorId = $selectedDoctorId;
    }

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        $query = Appointment::with(['patient', 'doctor.user'])
            ->whereDate('appointment_date', $tomorrow);

        if ($this->selectedDoctorId) {
            $query->where('doctor_id', $this->selectedDoctorId);
        }

        $appointments = $query->get();

        if ($appointments->isEmpty()) {
            return;
        }

        if ($this->selectedDoctorId) {
            $doctor = Doctor::find($this->selectedDoctorId);
            $doctorEmail = $doctor->user->email;

            $data = [
                'appointments' => $appointments,
                'doctor_name' => $doctor->user->name,
                'date' => Carbon::tomorrow()->format('d-m-Y'),
            ];

            $pdf = Pdf::loadView('pdf.tomorrow-appointments', $data);
            Log::info("pdf created");
            Mail::to($doctorEmail)->send(new AppointmentReceiptMail($data, $pdf));
        }
    }
}
