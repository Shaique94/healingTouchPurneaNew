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
                'available_days' => ['monday','wednesday','friday']
            ],
            [
                'name' => 'Priya Patel',
                'email' => 'priya.patel@healing-touch.com',
                'department' => 'Neurology',
                'available_days' => ['tuesday','thursday','saturday']
            ],
            [
                'name' => 'Rajiv Kumar',
                'email' => 'rajiv.kumar@healing-touch.com',
                'department' => 'Orthopedics',
                'available_days' => ['monday','tuesday','friday']
            ],
            [
                'name' => 'Anita Singh',
                'email' => 'anita.singh@healing-touch.com',
                'department' => 'Pediatrics',
                'available_days' => ['wednesday','thursday','saturday']
            ],
            [
                'name' => 'Vikram Desai',
                'email' => 'vikram.desai@healing-touch.com',
                'department' => 'Dermatology',
                'available_days' => ['monday','wednesday','saturday']
            ],
            [
                'name' => 'Neha Gupta',
                'email' => 'neha.gupta@healing-touch.com',
                'department' => 'Ophthalmology',
                'available_days' => ['tuesday','friday','saturday']
            ],
            [
                'name' => 'Arjun Reddy',
                'email' => 'arjun.reddy@healing-touch.com',
                'department' => 'ENT',
                'available_days' => ['monday','thursday','saturday']
            ],
            [
                'name' => 'Shreya Verma',
                'email' => 'shreya.verma@healing-touch.com',
                'department' => 'Gynecology',
                'available_days' => ['tuesday', 'wednesday', 'friday']
            ],
            [
                'name' => 'Amit Choudhary',
                'email' => 'amit.choudhary@healing-touch.com',
                'department' => 'Urology',
                'available_days' => ['monday','wednesday','friday']
            ],
            [
                'name' => 'Divya Prakash',
                'email' => 'divya.prakash@healing-touch.com',
                'department' => 'Dentistry',
                'available_days' => ['tuesday','thursday','saturday']
            ],
            [
                'name' => 'Ramesh Jha',
                'email' => 'ramesh.jha@healing-touch.com',
                'department' => 'General Medicine',
                'available_days' => ['monday','wednesday','friday','saturday']
            ],
            [
                'name' => 'Sonali Bose',
                'email' => 'sonali.bose@healing-touch.com',
                'department' => 'Psychiatry',
                'available_days' => ['tuesday','thursday','friday']
            ],
            [
                'name' => 'Anil Kapoor',
                'email' => 'anil.kapoor@healing-touch.com',
                'department' => 'Cardiology',
                'available_days' => ['tuesday','thursday','saturday']
            ],
            [
                'name' => 'Kiran Shah',
                'email' => 'kiran.shah@healing-touch.com',
                'department' => 'Pediatrics',
                'available_days' => ['monday','tuesday','friday']
            ],
            [
                'name' => 'Sanjay Mehta',
                'email' => 'sanjay.mehta@healing-touch.com',
                'department' => 'General Medicine',
                'available_days' => ['tuesday','thursday','saturday']
            ]
        ];

        foreach ($doctors as $doctorData) {
            $user = User::create([
                'name' => $doctorData['name'],
                'email' => $doctorData['email'],
                'password' => Hash::make('password'), // Default password
                'role' => 'doctor',
            ]);

            $department = $departments->where('name', $doctorData['department'])->first();

            if ($department) {
                $qualifications = $specialtyDegrees[$doctorData['department']] ?? ['MBBS'];

                Doctor::create([
                    'user_id' => $user->id,
                    'department_id' => $department->id,
                    'available_days' => $doctorData['available_days'],
                    'qualification' => json_encode($qualifications),
                    'fee' => 500,
                    'status' => true,
                    'image' => null,
                ]);
            }
        }
    }
}
