<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $departments = ['Cardiology', 'Neurology', 'Pediatrics', 'Orthopedics', 'Dermatology'];

        foreach ($departments as $dept) {
            Department::create(['name' => $dept]);
        }
    }
}
