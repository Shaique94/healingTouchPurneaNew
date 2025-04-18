<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Counter staff
        User::create([
            'name' => 'Reception',
            'description' => 'reception',
            'email' => 'reception@hospital.com',
            'password' => Hash::make('password'),
            'role' => 'reception',
        ]);

    }
}
