<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Admin',
        'username' => 'admin',
        'email' => 'admin@alat.com',
        'password' => Hash::make('admin123'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Staff',
        'username' => 'staff',
        'email' => 'staff@alat.com',
        'password' => Hash::make('staff123'),
        'role' => 'staff',
    ]);
    }
}
