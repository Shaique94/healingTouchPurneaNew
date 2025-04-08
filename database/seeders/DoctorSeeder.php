<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $doctorUsers = User::where('role', 'doctor')->get();
        $departmentIds = Department::pluck('id');

        foreach ($doctorUsers as $user) {
            Doctor::create([
                'user_id' => $user->id,
                'department_id' => $departmentIds->random(),
                'phone' => '1234567890',
                'available_days' => json_encode(['Monday', 'Wednesday', 'Friday']),
            ]);
        }
    }
}
