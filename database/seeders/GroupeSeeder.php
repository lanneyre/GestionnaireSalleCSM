<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupeSeeder extends Seeder
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
            DB::table('groupes')->insert([
                'nom' => Str::random(\rand(3, 8)) . rand(1, 6),
                'effectif' => \rand(8, 20)
            ]);
        }
    }
}
