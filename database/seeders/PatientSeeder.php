<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Patient::create([
                'name' => "Patient $i",
                'email' => "patient$i@example.com",
                'phone' => '9876543210',
                'age' => rand(1, 100),
                'gender' => 'male',
                'city' => 'City ' . $i,
                'state' => 'State',
                'country' => 'Country',
            ]);
        }
    }
}
