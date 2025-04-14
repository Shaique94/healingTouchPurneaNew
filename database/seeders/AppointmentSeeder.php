<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $counter = User::where('role', 'reception')->first();

        foreach ($patients as $patient) {
            Appointment::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random()->id,
                'appointment_date' => now()->addDays(rand(1, 10)),
                'appointment_time' => now()->setTime(rand(9, 16), 0),
                'status' => 'pending',
                'payment_method' => 'cash',
                'notes' => 'Follow-up',
                'created_by' => $counter->id,
            ]);
        }
    }
}
