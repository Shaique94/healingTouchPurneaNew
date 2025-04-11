<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hospital.com'],
            [
                'name' => 'Hospital Admin',
                'email' => 'admin@hospital.com',
                'password' => Hash::make('password123'), // You can change this
                'role' => 'admin',
                'phone' => '9999999999',
            ]
        );
    }
}
