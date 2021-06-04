<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //coordinadoras
        $employee = new User();
        $employee->nombre= 'Desirée';
        $employee->apellidos= 'Barragán Urionabarranechea';
        $employee->telefono= 659632145;
        $employee->dni= '47569874P';
        $employee->password= Hash::make('desiree123');
        $employee->email= 'desi@gmail.com';
        $employee->img= null;
        $employee->zona= 1;
        $employee->rol_id= 1;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Raquel';
        $employee->apellidos= 'Gutierrez Antequera';
        $employee->telefono= 678987456;
        $employee->dni= '45786597V';
        $employee->password= Hash::make('raquel123');
        $employee->email= 'raqui@gmail.com';
        $employee->img= null;
        $employee->zona= 2;
        $employee->rol_id= 1;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Sonia';
        $employee->apellidos= 'Perea Martin';
        $employee->telefono= 666777888;
        $employee->dni= '45129863Y';
        $employee->password= Hash::make('sonia123');
        $employee->email= 'sonia@gmail.com';
        $employee->img= null;
        $employee->zona= 3;
        $employee->rol_id= 1;
        $employee->save();

        //tf zona 1
        $employee = new User();
        $employee->nombre= 'Nathalie';
        $employee->apellidos= 'Quiroz Neira';
        $employee->telefono= 654789123;
        $employee->dni= '45130958N';
        $employee->password= Hash::make('nathalie123');
        $employee->email= 'nath@gmail.com';
        $employee->img= null;
        $employee->zona= 1;
        $employee->rol_id= 2;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Andrea';
        $employee->apellidos= 'Alonso Salguero';
        $employee->telefono= 666333999;
        $employee->dni= '45318798A';
        $employee->password= Hash::make('andrea123');
        $employee->email= 'andrea@gmail.com';
        $employee->img= null;
        $employee->zona= 1;
        $employee->rol_id= 2;
        $employee->save();

        //tf zona 2
        $employee = new User();
        $employee->nombre= 'Sandra';
        $employee->apellidos= 'Gonzalez Marin';
        $employee->telefono= 607068413;
        $employee->dni= '45126056X';
        $employee->password= Hash::make('sandra123');
        $employee->email= 'sandri@gmail.com';
        $employee->img= null;
        $employee->zona= 2;
        $employee->rol_id= 2;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Marc';
        $employee->apellidos= 'Perez Ruiz';
        $employee->telefono= 666111198;
        $employee->dni= '45386633A';
        $employee->password= Hash::make('marc123');
        $employee->email= 'marc@gmail.com';
        $employee->img= null;
        $employee->zona= 2;
        $employee->rol_id= 2;
        $employee->save();

        //tf zona 3
        $employee = new User();
        $employee->nombre= 'Francisco';
        $employee->apellidos= 'Garcia Virgolini';
        $employee->telefono= 612345987;
        $employee->dni= '45786534F';
        $employee->password= Hash::make('fran123');
        $employee->email= 'fran@gmail.com';
        $employee->img= null;
        $employee->zona= 3;
        $employee->rol_id= 2;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Elena';
        $employee->apellidos= 'Malova Del Bosque';
        $employee->telefono= 654123987;
        $employee->dni= '45123498E';
        $employee->password= Hash::make('elena123');
        $employee->email= 'delbosque@gmail.com';
        $employee->img= null;
        $employee->zona= 3;
        $employee->rol_id= 2;
        $employee->save();

        //ts
        $employee = new User();
        $employee->nombre= 'Antonia';
        $employee->apellidos= 'Perez Martinez';
        $employee->telefono= 661331999;
        $employee->dni= '45987654P';
        $employee->password= Hash::make('antonia123');
        $employee->email= 'antonia@gmail.com';
        $employee->img= null;
        $employee->zona= null;
        $employee->rol_id= 3;
        $employee->save();

        $employee = new User();
        $employee->nombre= 'Mireia';
        $employee->apellidos= 'Corbacho Marron';
        $employee->telefono= 661851999;
        $employee->dni= '12358749P';
        $employee->password= Hash::make('mireia123');
        $employee->email= 'mireia@gmail.com';
        $employee->img= null;
        $employee->zona= null;
        $employee->rol_id= 3;
        $employee->save();
    }
}
