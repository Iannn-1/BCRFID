<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@rfid.com',
            'password' => Hash::make('password123'),
        ]);
        
        User::create([
            'name' => 'user',
            'email' => 'user@rfid.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
