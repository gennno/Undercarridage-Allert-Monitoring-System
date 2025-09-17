<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User IMAN',
            'role' => 'Admin',
            'email' => 'admin@iman.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'User IMAN',
            'role' => 'User',
            'email' => 'user@iman.com',
            'password' => Hash::make('user123'),
        ]);
    }
}
