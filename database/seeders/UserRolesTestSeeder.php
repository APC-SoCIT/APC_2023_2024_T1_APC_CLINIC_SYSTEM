<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserRolesTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Users with Roles
        User::create([
            'name' => 'No Role User',
            'email' => 'norole@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'No Role')->first()->id,
        ]);

        User::create([
            'name' => 'Student User',
            'email' => 'student@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::create([
            'name' => 'Faculty User',
            'email' => 'faculty@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Faculty')->first()->id,
        ]);

        User::create([
            'name' => 'Staff User',
            'email' => 'staff@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Staff')->first()->id,
        ]);

        User::create([
            'name' => 'Nurse User',
            'email' => 'nurse@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Nurse')->first()->id,
        ]);

        User::create([
            'name' => 'Doctor User',
            'email' => 'doctor@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Doctor')->first()->id,
        ]);

        User::create([
            'name' => 'Dentist User',
            'email' => 'dentist@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Dentist')->first()->id,
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Admin')->first()->id,
        ]);

        $this->command->info('Users and roles seeded successfully.');
    }
}
