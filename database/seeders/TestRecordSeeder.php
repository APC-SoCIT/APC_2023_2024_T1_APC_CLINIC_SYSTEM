<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Record;

class TestRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::create([
            'user_id' => User::where('name', 'Student User')->first()->id,
            'birth_date' =>  Carbon::create(2001, 1, 3)->format('Y-m-d'),
            'age' => '22',
            'sex' => 'Male',
            'civil_status' => 'Single',
            'address' => '98 Chkai',
            'street' => 'Balagbag',
            'city' => 'Pasay City',
            'province' => 'Metro Manila',
            'zip' => '1300',
            'mobile_number' => '09987364722',
            'contact_person' => 'Jackilyn Grahams',
            'contact_person_number' => '09873846578',
        ]);
    }
}
