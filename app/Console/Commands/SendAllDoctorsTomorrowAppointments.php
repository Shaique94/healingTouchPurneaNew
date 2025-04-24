<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Doctor;
use App\Jobs\SendTomorrowAppointmentsPDF;
use App\Models\User;

class SendAllDoctorsTomorrowAppointments extends Command
{
    protected $signature = 'send:doctors-tomorrow-appointments';
    protected $description = 'Send tomorrow\'s appointments PDF to all doctors';

    public function handle()
    {
        $doctorUsers = User::where('role', 'doctor')->with('doctor')->get();

        foreach ($doctorUsers as $user) {
            if ($user->doctor) {
                SendTomorrowAppointmentsPDF::dispatch($user->doctor->id);
            }
        }

        $this->info('Dispatched emails for all doctors.');
    }
}
