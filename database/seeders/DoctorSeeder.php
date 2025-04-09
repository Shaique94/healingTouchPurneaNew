<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all departments
        $departments = Department::all();
        
        // Define specialty degrees for each department
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

        // Sample doctor data
        $doctors = [
            [
                'name' => 'Sunil Sharma',
                'email' => 'sunil.sharma@healing-touch.com',
                'department' => 'Cardiology',
                'phone' => '9876543210',
                'available_days' => ['Monday', 'Wednesday', 'Friday']
            ],
            [
                'name' => 'Priya Patel',
                'email' => 'priya.patel@healing-touch.com',
                'department' => 'Neurology',
                'phone' => '9876543211',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday']
            ],
            [
                'name' => 'Rajiv Kumar',
                'email' => 'rajiv.kumar@healing-touch.com',
                'department' => 'Orthopedics',
                'phone' => '9876543212',
                'available_days' => ['Monday', 'Tuesday', 'Friday']
            ],
            [
                'name' => 'Anita Singh',
                'email' => 'anita.singh@healing-touch.com',
                'department' => 'Pediatrics',
                'phone' => '9876543213',
                'available_days' => ['Wednesday', 'Thursday', 'Saturday']
            ],
            [
                'name' => 'Vikram Desai',
                'email' => 'vikram.desai@healing-touch.com',
                'department' => 'Dermatology',
                'phone' => '9876543214',
                'available_days' => ['Monday', 'Wednesday', 'Saturday']
            ],
            [
                'name' => 'Neha Gupta',
                'email' => 'neha.gupta@healing-touch.com',
                'department' => 'Ophthalmology',
                'phone' => '9876543215',
                'available_days' => ['Tuesday', 'Friday', 'Saturday']
            ],
            [
                'name' => 'Arjun Reddy',
                'email' => 'arjun.reddy@healing-touch.com',
                'department' => 'ENT',
                'phone' => '9876543216',
                'available_days' => ['Monday', 'Thursday', 'Saturday']
            ],
            [
                'name' => 'Shreya Verma',
                'email' => 'shreya.verma@healing-touch.com',
                'department' => 'Gynecology',
                'phone' => '9876543217',
                'available_days' => ['Tuesday', 'Wednesday', 'Friday']
            ],
            [
                'name' => 'Amit Choudhary',
                'email' => 'amit.choudhary@healing-touch.com',
                'department' => 'Urology',
                'phone' => '9876543218',
                'available_days' => ['Monday', 'Wednesday', 'Friday']
            ],
            [
                'name' => 'Divya Prakash',
                'email' => 'divya.prakash@healing-touch.com',
                'department' => 'Dentistry',
                'phone' => '9876543219',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday']
            ],
            [
                'name' => 'Ramesh Jha',
                'email' => 'ramesh.jha@healing-touch.com',
                'department' => 'General Medicine',
                'phone' => '9876543220',
                'available_days' => ['Monday', 'Wednesday', 'Friday', 'Saturday']
            ],
            [
                'name' => 'Sonali Bose',
                'email' => 'sonali.bose@healing-touch.com',
                'department' => 'Psychiatry',
                'phone' => '9876543221',
                'available_days' => ['Tuesday', 'Thursday', 'Friday']
            ],
            // Add more doctors for some departments to have multiple doctors
            [
                'name' => 'Anil Kapoor',
                'email' => 'anil.kapoor@healing-touch.com',
                'department' => 'Cardiology',
                'phone' => '9876543222',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday']
            ],
            [
                'name' => 'Kiran Shah',
                'email' => 'kiran.shah@healing-touch.com',
                'department' => 'Pediatrics',
                'phone' => '9876543223',
                'available_days' => ['Monday', 'Tuesday', 'Friday']
            ],
            [
                'name' => 'Sanjay Mehta',
                'email' => 'sanjay.mehta@healing-touch.com',
                'department' => 'General Medicine',
                'phone' => '9876543224',
                'available_days' => ['Tuesday', 'Thursday', 'Saturday']
            ]
        ];

        // Create doctors with their corresponding users
        foreach ($doctors as $doctorData) {
            // Create user for the doctor
            $user = User::create([
                'name' => $doctorData['name'],
                'email' => $doctorData['email'],
                'password' => Hash::make('password'), // Default password: 'password'
                'role' => 'doctor',
            ]);

            // Find the department
            $department = $departments->where('name', $doctorData['department'])->first();
            
            if ($department) {
                // Create doctor profile
                $doctor = Doctor::create([
                    'user_id' => $user->id,
                    'department_id' => $department->id,
                    'phone' => $doctorData['phone'],
                    'available_days' => $doctorData['available_days'],
                ]);

                // Add random degree to user metadata if needed
                $degrees = $specialtyDegrees[$doctorData['department']] ?? ['MBBS'];
                $randomDegree = $degrees[array_rand($degrees)];
                
                // You can add doctor's degree to user metadata if you have such a field
                // $user->update(['metadata' => ['degree' => "MBBS, $randomDegree"]]);
            }
        }
    }
}
