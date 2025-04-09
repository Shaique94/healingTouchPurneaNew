<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Cardiology',
                'description' => 'Specializes in diagnosing and treating diseases or conditions of the heart and blood vessels.'
            ],
            [
                'name' => 'Neurology',
                'description' => 'Deals with the diagnosis and treatment of disorders of the nervous system.'
            ],
            [
                'name' => 'Orthopedics',
                'description' => 'Focuses on injuries and diseases of the body\'s musculoskeletal system.'
            ],
            [
                'name' => 'Pediatrics',
                'description' => 'Specializes in medical care for infants, children, and adolescents.'
            ],
            [
                'name' => 'Dermatology',
                'description' => 'Focuses on conditions involving the skin, hair, and nails.'
            ],
            [
                'name' => 'Ophthalmology',
                'description' => 'Deals with the diagnosis and treatment of eye disorders.'
            ],
            [
                'name' => 'ENT',
                'description' => 'Specializes in conditions of the ear, nose, and throat.'
            ],
            [
                'name' => 'Gynecology',
                'description' => 'Focuses on women\'s health, particularly the reproductive system.'
            ],
            [
                'name' => 'Urology',
                'description' => 'Focuses on diseases of the urinary tract and the male reproductive system.'
            ],
            [
                'name' => 'Dentistry',
                'description' => 'Deals with the diagnosis, prevention, and treatment of diseases and conditions of the oral cavity.'
            ],
            [
                'name' => 'General Medicine',
                'description' => 'Covers a wide range of general health issues and preventive care.'
            ],
            [
                'name' => 'Psychiatry',
                'description' => 'Deals with the diagnosis, prevention, and treatment of mental disorders.'
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
