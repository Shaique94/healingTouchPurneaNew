<?php

namespace App\Jobs;

use App\Models\Appointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $appointmentId;
    protected $otp;

    /**
     * Create a new job instance.
     */
    public function __construct($appointmentId, $otp)
    {    
        Log::info('SendOtpJob created', [
            'appointmentId' => $appointmentId,
            'otp' => $otp,
        ]);
        $this->appointmentId = $appointmentId;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('Handling SendOtpJob', [
                'appointmentId' => $this->appointmentId,
                'otp' => $this->otp,
            ]);
    
            $appointment = Appointment::with('patient')->find($this->appointmentId);
    
            if (!$appointment || !$appointment->patient || !$appointment->patient->email) {
                Log::warning("No appointment or patient email found", [
                    'appointmentId' => $this->appointmentId,
                ]);
                return;
            }
    
            Mail::raw("Your OTP is: {$this->otp}", function ($message) use ($appointment) {
                $message->to($appointment->patient->email)
                    ->subject('Your OTP Code');
            });
    
            Log::info('OTP sent successfully', [
                'appointmentId' => $this->appointmentId,
                'patientEmail' => $appointment->patient->email,
            ]);
        } catch (\Throwable $e) {
            Log::error('SendOtpJob failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
    
}
