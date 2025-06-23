<?php

namespace App\Jobs;

use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendOtpJob implements ShouldQueue
{
    use Queueable;

    protected $appointmentId;
    protected $otp;

    /**
     * Create a new job instance.
     */
    public function __construct($appointmentId, $otp)
    {    
        $this->appointmentId = $appointmentId;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $appointment = Appointment::find($this->appointmentId);

        if (!$appointment || !$appointment->patient || !$appointment->patient->email) {
            return;
        }

        Mail::raw("Your OTP is: {$this->otp}", function ($message) use ($appointment) {
            $message->to($appointment->patient->email)
                ->subject('Your OTP Code');
        });
    }
}
