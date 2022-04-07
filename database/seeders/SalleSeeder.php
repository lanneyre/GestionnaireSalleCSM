<?php

namespace Database\Seeders;

use App\Models\Salle;
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
        Salle::create([
            'numArchi' => "Ent",
            'numOfficiel' => "Ent",
            'nom' => "Entreprise",
            'superficie' => 0,
            'nbMaxApprenants' => 0,
            'etage' => 0
        ]);
        Salle::create([
            'numArchi' => "Vac",
            'numOfficiel' => "Vac",
            'nom' => "Vacance",
            'superficie' => 0,
            'nbMaxApprenants' => 0,
            'etage' => 0
        ]);

        // for ($i = 0; $i < 10; $i++) {
        //     Salle::create([
        //         'numArchi' => Str::random(5),
        //         'numOfficiel' => Str::random(3),
        //         'nom' => Str::random(\rand(8, 12)),
        //         'superficie' => \rand(20, 80),
        //         'nbMaxApprenants' => \rand(10, 30),
        //         'etage' => \rand(3, 6)
        //     ]);
        // }
    }
}
