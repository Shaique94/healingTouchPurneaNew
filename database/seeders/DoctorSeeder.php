<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();

        $specialtyDegrees = [
            'Cardiology' => ['MD Cardiology', 'DM Cardiology'],
            'Neurology' => ['MD Neurology', 'DM Neurology'],
            'Orthopedics' => ['MS Orthopedics', 'DNB Orthopedics'],
            'Pediatrics' => ['MD Pediatrics', 'DCH'],
            'Dermatology' => ['MD Dermatology', 'DVD'],
            'Ophthalmology' => ['MS Ophthalmology', 'DNB Ophthalmology'],
            'ENT' => ['MS ENT', 'DNB ENT'],
            'Gynecology' => ['MS Gynecology', 'DNB Gynecology'],
            'Urology' => ['MS Urology', 'DNB Urology'],
            'Dentistry' => ['BDS', 'MDS'],
            'General Medicine' => ['MD Medicine', 'MBBS'],
            'Psychiatry' => ['MD Psychiatry', 'DNB Psychiatry']
        ];

        $doctors = [
            [
                'name' => 'Sunil Sharma',
                'email' => 'sunil.sharma@healing-touch.com',
                'department' => 'Cardiology',
                'available_days' => ['Monday', 'Wednesday', 'Friday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Priya Patel',
                'email' => 'priya.patel@healing-touch.com',
                'department' => 'Neurology',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Rajiv Kumar',
                'email' => 'rajiv.kumar@healing-touch.com',
                'department' => 'Orthopedics',
                'available_days' => ['Monday', 'Tuesday', 'Friday'],
                'status' => '0', // Inactive
            ],
            [
                'name' => 'Anita Singh',
                'email' => 'anita.singh@healing-touch.com',
                'department' => 'Pediatrics',
                'available_days' => ['Wednesday', 'Thursday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Vikram Desai',
                'email' => 'vikram.desai@healing-touch.com',
                'department' => 'Dermatology',
                'available_days' => ['Monday', 'Wednesday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Neha Gupta',
                'email' => 'neha.gupta@healing-touch.com',
                'department' => 'Ophthalmology',
                'available_days' => ['Tuesday', 'Friday', 'Saturday'],
                'status' => '2', // Disable
            ],
            [
                'name' => 'Arjun Reddy',
                'email' => 'arjun.reddy@healing-touch.com',
                'department' => 'ENT',
                'available_days' => ['Monday', 'Thursday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Shreya Verma',
                'email' => 'shreya.verma@healing-touch.com',
                'department' => 'Gynecology',
                'available_days' => ['Tuesday', 'Wednesday', 'Friday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Amit Choudhary',
                'email' => 'amit.choudhary@healing-touch.com',
                'department' => 'Urology',
                'available_days' => ['Monday', 'Wednesday', 'Friday'],
                'status' => '0', // Inactive
            ],
            [
                'name' => 'Divya Prakash',
                'email' => 'divya.prakash@healing-touch.com',
                'department' => 'Dentistry',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Ramesh Jha',
                'email' => 'ramesh.jha@healing-touch.com',
                'department' => 'General Medicine',
                'available_days' => ['Monday', 'Wednesday', 'Friday', 'Saturday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Sonali Bose',
                'email' => 'sonali.bose@healing-touch.com',
                'department' => 'Psychiatry',
                'available_days' => ['Tuesday', 'Thursday', 'Friday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Anil Kapoor',
                'email' => 'anil.kapoor@healing-touch.com',
                'department' => 'Cardiology',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday'],
                'status' => '2', // Disable
            ],
            [
                'name' => 'Kiran Shah',
                'email' => 'kiran.shah@healing-touch.com',
                'department' => 'Pediatrics',
                'available_days' => ['Monday', 'Tuesday', 'Friday'],
                'status' => '1', // Active
            ],
            [
                'name' => 'Sanjay Mehta',
                'email' => 'sanjay.mehta@healing-touch.com',
                'department' => 'General Medicine',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday'],
                'status' => '1', // Active
            ],
        ];

        foreach ($doctors as $doctorData) {
            $user = User::create([
                'name' => $doctorData['name'],
                'email' => $doctorData['email'],
                'password' => Hash::make('password'), // Default password
                'role' => 'doctor',
                'description' => 'Experienced and compassionate specialist in ' . $doctorData['department'] . '.',
            ]);

            $department = $departments->where('name', $doctorData['department'])->first();

            if ($department) {
                $qualifications = $specialtyDegrees[$doctorData['department']] ?? ['MBBS'];
                $qualificationString = implode(', ', $qualifications); // Convert to string

                Doctor::create([
                    'user_id' => $user->id,
                    'department_id' => $department->id,
                   
                    'available_days' => $doctorData['available_days'],
                    'qualification' => $qualificationString,
                    'fee' => 500,
                    'status' => $doctorData['status'], // String for ENUM ('0', '1', '2')
                    'image' => null,
                ]);
            }
        }
    }
}