<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;
class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Career::create([
                'title' => "Job Title $i",
                'description' => "Description for job title $i",
                'salary' => rand(30000, 120000),
                'location' => "City $i",
                'status' => rand(0, 1),
            ]);
        }
    }
}
