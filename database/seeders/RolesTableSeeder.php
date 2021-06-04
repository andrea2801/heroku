<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->rol='coordinadora';
        $role->save();

        $role = new Role();
        $role->rol='tf';
        $role->save();

        $role = new Role();
        $role->rol='ts';
        $role->save();
    }
}
