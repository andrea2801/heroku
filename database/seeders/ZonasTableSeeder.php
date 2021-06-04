<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zona = new Zona();
        $zona->zonas='clot';
        $zona->save();

        $zona = new Zona();
        $zona->zonas='sant marti';
        $zona->save();

        $zona = new Zona();
        $zona->zonas='sagrada familia';
        $zona->save();
    }
}
