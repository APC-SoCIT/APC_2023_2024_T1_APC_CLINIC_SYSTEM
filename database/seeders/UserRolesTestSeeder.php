<?php

namespace Database\Seeders;

use Database\Factories\StudentUserFactory;
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
            'name' => 'Nurse',
            'email' => 'nurse@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Nurse')->first()->id,
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Doctor')->first()->id,
        ]);

        User::create([
            'name' => 'Dentist',
            'email' => 'dentist@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Dentist')->first()->id,
        ]);

        //Student
        User::create([
            'name' => 'No Role User',
            'email' => 'norole@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'No Role')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Christine Ferry',
            'email' => 'cferry@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Carolyne Amore',
            'email' => 'camore@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Delaney Spinka',
            'email' => 'dspinka@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Andrew Towne',
            'email' => 'atowne@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Avis Schinner',
            'email' => 'aschinner@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Rylee Medhurst',
            'email' => 'rmedhurst@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Ova Paucek',
            'email' => 'opaucek@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Emmanuelle Collins',
            'email' => 'ecollins@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Vicenta Bednar',
            'email' => 'vbednar@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Jonathan Moen',
            'email' => 'jmoen@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Darrick Zieme',
            'email' => 'dzieme@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Wilber Mayer',
            'email' => 'wmayer@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Mabelle Lehner',
            'email' => 'mlehner@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Clementina Mayer',
            'email' => 'cmayer@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Astrid Hintz',
            'email' => 'ahintz@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Marion Skiles',
            'email' => 'mskiles@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Everette Jaskolski',
            'email' => 'ejaskolski@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Heaven Carter',
            'email' => 'hcarter@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Halle Runolfsson',
            'email' => 'hrunolfsson@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Thaddeus Zboncak',
            'email' => 'tzboncak@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Sophia Leuschke',
            'email' => 'sleuschke@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Samson Hilpert',
            'email' => 'shilpert@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Weldon Kunze',
            'email' => 'wkunze@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Aurelio Casper',
            'email' => 'acasper@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        User::factory()->create([
            'name' => 'Gunnar Macejkovic',
            'email' => 'gmacejkovic@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('role', 'Student')->first()->id,
        ]);

        //Faculty
        //User::create([
        //    'name' => 'Faculty User',
        //    'email' => 'faculty@apc.edu.ph',
        //    'password' => Hash::make('password'),
        //    'role_id' => Role::where('role', 'Faculty')->first()->id,
        //]);

        //User::create([
        //    'name' => 'Staff User',
        //    'email' => 'staff@apc.edu.ph',
        //    'password' => Hash::make('password'),
        //    'role_id' => Role::where('role', 'Staff')->first()->id,
        //]);

        //User::create([
        //    'name' => 'Admin',
        //    'email' => 'admin@apc.edu.ph',
        //    'password' => Hash::make('password'),
        //    'role_id' => Role::where('role', 'Admin')->first()->id,
        //]);
    }
}


