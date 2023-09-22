<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories=[
            [
                'name' => 'Biogesic',
                'gram' => '20',
                'quantity' => 480,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Decolgen',
                'gram' => '12',
                'quantity' => 780,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Tuseran',
                'gram' => '10',
                'quantity' => 500,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Isodril',
                'gram' => '15',
                'quantity' => 610,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Neobloc',
                'gram' => '50',
                'quantity' => 120,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Sinutab',
                'gram' => '15',
                'quantity' => 623,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Serc',
                'gram' => '16',
                'quantity' => 200,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Bioflu',
                'gram' => '20',
                'quantity' => 320,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Feldene Flash',
                'gram' => '8',
                'quantity' => 223,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Neozep',
                'gram' => '22',
                'quantity' => 330,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Calcibloc',
                'gram' => '10',
                'quantity' => 120,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Mefenamic Acid',
                'gram' => '12',
                'quantity' => 500,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Dizitab',
                'gram' => '25',
                'quantity' => 250,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Kremil S',
                'gram' => '25',
                'quantity' => 251,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Omeprazole',
                'gram' => '13',
                'quantity' => 133,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Sinupret',
                'gram' => '12',
                'quantity' => 150,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Catapress',
                'gram' => '.75',
                'quantity' => 80,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Catopril',
                'gram' => '25',
                'quantity' => 30,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Ambroxol',
                'gram' => '30',
                'quantity' => 303,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Telfast',
                'gram' => '18',
                'quantity' => 184,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Alerta',
                'gram' => '12',
                'quantity' => 220,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Alnix',
                'gram' => '3',
                'quantity' => 38,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Cetirizine',
                'gram' => '13',
                'quantity' => 121,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Buscopan',
                'gram' => '9',
                'quantity' => 75,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Buscopan Venus',
                'gram' => '12',
                'quantity' => 33,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Sambong',
                'gram' => '20',
                'quantity' => 44,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Benadryl',
                'gram' => '10',
                'quantity' => 88,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Alaxan FR',
                'gram' => '25',
                'quantity' => 81,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Symdex D',
                'gram' => '5',
                'quantity' => 50,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Loperamide',
                'gram' => '13',
                'quantity' => 410,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Plasil',
                'gram' => '10',
                'quantity' => 42,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Midol',
                'gram' => '10',
                'quantity' => 79,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Advil',
                'gram' => '14',
                'quantity' => 210,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Carbocisteine',
                'gram' => '16',
                'quantity' => 22,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Ascof',
                'gram' => '10',
                'quantity' => 300,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Salbutamol',
                'gram' => '12',
                'quantity' => 12,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Ventolin Nebule',
                'gram' => '25',
                'quantity' => 33,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Dequadine',
                'gram' => '11',
                'quantity' => 60,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Sinecod',
                'gram' => '14',
                'quantity' => 40,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Hydrite',
                'gram' => '30',
                'quantity' => 66,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Band-Aid Visine',
                'gram' => '0',
                'quantity' => 57,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Antigen Test Kit',
                'gram' => '0',
                'quantity' => 123,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Salonpas',
                'gram' => '0',
                'quantity' => 72,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Omega Pain Killer',
                'gram' => '20',
                'quantity' => 34,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Bactidol',
                'gram' => '120',
                'quantity' => 12,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Betadine',
                'gram' => '100',
                'quantity' => 18,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Dequadin',
                'gram' => '100',
                'quantity' => 8,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Cotton',
                'gram' => '0',
                'quantity' => 20,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Cotton Buds',
                'gram' => '0',
                'quantity' => 42,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Transpore',
                'gram' => '0',
                'quantity' => 20,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Mediplast',
                'gram' => '0',
                'quantity' => 60,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Sure-Guard',
                'gram' => '0',
                'quantity' => 41,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Bactifree',
                'gram' => '5000',
                'quantity' => 5,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Cutasept',
                'gram' => '250',
                'quantity' => 21,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Lancets',
                'gram' => '0',
                'quantity' => 150,
                'type' => 'Equipment',
            ],
            [
                'name' => 'Agua Oxigenada',
                'gram' => '120',
                'quantity' => 6,
                'type' => 'Medicine',
            ],
            [
                'name' => 'Alcohol',
                'gram' => '120',
                'quantity' => 3,
                'type' => 'Medicine',
            ],
        ];
        foreach ($inventories as $key => $inventories) {
            Inventory::create($inventories);
        }
    }
}
