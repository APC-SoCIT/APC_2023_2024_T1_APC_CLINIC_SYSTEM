<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'role_id' => Role::where('title', 'Nurse')->first()->id,
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Doctor')->first()->id,
        ]);

        User::create([
            'name' => 'Dentist',
            'email' => 'dentist@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Dentist')->first()->id,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Admin')->first()->id,
        ]);
        
        //Student
        User::factory()->school()->create([
            'name' => 'Christine Ferry',
            'email' => 'cferry@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSBA-MA',
            'section' => 'MA221',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Carolyne Amore',
            'email' => 'camore@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'ABPsy',
            'section' => 'ABPsy213',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Delaney Spinka',
            'email' => 'dspinka@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSMAc',
            'section' => 'BSMAc202',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Andrew Towne',
            'email' => 'atowne@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-CS',
            'section' => 'CS211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Avis Schinner',
            'email' => 'aschinner@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSMAc',
            'section' => 'BSMAc202',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Rylee Medhurst',
            'email' => 'rmedhurst@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSIT-MI',
            'section' => 'MI192',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Ova Paucek',
            'email' => 'opaucek@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Emmanuelle Collins',
            'email' => 'ecollins@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Vicenta Bednar',
            'email' => 'vbednar@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Jonathan Moen',
            'email' => 'jmoen@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BMMA',
            'section' => 'BMMA193',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Darrick Zieme',
            'email' => 'dzieme@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-SS',
            'section' => 'SS201',
        ]);

        User::factory()->school()->create([
            'name' => 'Wilber Mayer',
            'email' => 'wmayer@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCpE',
            'section' => 'BSCpE181',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Mabelle Lehner',
            'email' => 'mlehner@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSIT-MI',
            'section' => 'MI192',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Clementina Mayer',
            'email' => 'cmayer@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSECE',
            'section' => 'BSECE211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Astrid Hintz',
            'email' => 'ahintz@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSECE',
            'section' => 'BSECE211',
        ]);

        User::factory()->school()->create([
            'name' => 'Marion Skiles',
            'email' => 'mskiles@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-CS',
            'section' => 'CS211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Everette Jaskolski',
            'email' => 'ejaskolski@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-CS',
            'section' => 'CS211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Heaven Carter',
            'email' => 'hcarter@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-CS',
            'section' => 'CS211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Halle Runolfsson',
            'email' => 'hrunolfsson@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Thaddeus Zboncak',
            'email' => 'tzboncak@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);

        User::factory()->school()->create([
            'name' => 'Sophia Leuschke',
            'email' => 'sleuschke@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSCS-CS',
            'section' => 'CS211',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Samson Hilpert',
            'email' => 'shilpert@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSTM-HRO',
            'section' => 'HRO205',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Weldon Kunze',
            'email' => 'wkunze@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BMMA',
            'section' => 'BMMA193',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Aurelio Casper',
            'email' => 'acasper@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSBA-FM',
            'section' => 'FM221',
        ]);
        
        User::factory()->school()->create([
            'name' => 'Gunnar Macejkovic',
            'email' => 'gmacejkovic@student.apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Student')->first()->id,
            'program' => 'BSBA-MA',
            'section' => 'MA221',
        ]);
        
        
        //Faculty
        User::factory()->worker()->create([
            'name' => 'Kelton Hoeger',
            'email' => 'khoeger@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Faculty')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Jesse Schoen',
            'email' => 'jschoen@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Faculty')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Aiyana Schmidt',
            'email' => 'aschmidt@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Faculty')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Mose Doyle',
            'email' => 'mdoyle@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Faculty')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Charley Moore',
            'email' => 'cmoore@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Faculty')->first()->id,
        ]);
        
        //Faculty
        User::factory()->worker()->create([
            'name' => 'Jaron Strosin',
            'email' => 'jstrosin@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Staff')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Eden Cole',
            'email' => 'ecole@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Staff')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Wilson Auer',
            'email' => 'wauer@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Staff')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Derick Konopelski',
            'email' => 'dkonopelski@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Staff')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Ottilie Wolff',
            'email' => 'owolff@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'Staff')->first()->id,
        ]);
        
        //No Roles
        User::factory()->worker()->create([
            'name' => 'Darrell Macejkovic',
            'email' => 'dmacejkovic@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'No Role')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Oswald Jacobs',
            'email' => 'ojacobs@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'No Role')->first()->id,
        ]);
        User::factory()->worker()->create([
            'name' => 'Giles Schulist',
            'email' => 'gschulist@apc.edu.ph',
            'password' => Hash::make('password'),
            'role_id' => Role::where('title', 'No Role')->first()->id,
        ]);
    }
}


