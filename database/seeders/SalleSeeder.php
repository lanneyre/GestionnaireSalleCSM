<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Support\Int;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('salles')->insert([
                'numArchi' => Str::random(5),
                'numOfficiel' => Str::random(3),
                'nom' => Str::random(\rand(8, 12)),
                'superficie' => \rand(20, 80),
                'nbMaxApprenants' => \rand(10, 30),
                'etage' => \rand(3, 6)
            ]);
        }
    }
}
