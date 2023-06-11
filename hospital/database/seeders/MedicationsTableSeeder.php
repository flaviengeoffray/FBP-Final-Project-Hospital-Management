<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MedicationsTableSeeder extends Seeder
{
    public function run()
{
    DB::table('medications')->insert([
    ['name' => 'Paracetamol', 'dosage' => '500mg', 'instructions' => 'Prendre avec de leau'],
    ['name' => 'Aspirin', 'dosage' => '100mg', 'instructions' => 'Prendre après les repas'],
    ]);

}


}
