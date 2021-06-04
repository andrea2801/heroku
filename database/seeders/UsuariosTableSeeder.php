<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario();
        $usuario->nombre="Pepe";
        $usuario->apellidos="Botica";
        $usuario->telefono=654698745;
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->dni="74125896P";
        $usuario->persona_contacto="Maria (hija): 654874521";
        $usuario->detalle="Persona con discapacidad del 33% que vive sola, necesita ayuda en las AVD, PRINCIPIOS de alzheimer";
        $usuario->tareas="Acompañamiento en la compra; Hacer la comida;";
        $usuario->horas_asignadas=9;
        $usuario->tf_asignada=5;
        $usuario->tf_asignada2=4;
        $usuario->zona=1;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Amelia";
        $usuario->apellidos="Sheperd";
        $usuario->telefono=687498745;
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->dni="74123698A";
        $usuario->persona_contacto="Meredith (hermana): 654874521";
        $usuario->detalle="Persona con discapacidad del 33% que vive sola, necesita ayuda en las AVD, PRINCIPIOS de alzheimer";
        $usuario->tareas="Acompañamiento en la compra; Hacer la comida;";
        $usuario->horas_asignadas=6;
        $usuario->tf_asignada=5;
        $usuario->tf_asignada2=null;
        $usuario->zona=1;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Mauricio";
        $usuario->apellidos="Colmenero";
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->telefono=458798745;
        $usuario->dni="89654123K";
        $usuario->persona_contacto="Paco (hijo): 654874521";
        $usuario->detalle="Persona con discapacidad del 33% que vive sola, necesita ayuda en las AVD, PRINCIPIOS de alzheimer";
        $usuario->tareas="Acompañamiento en la compra; Hacer la comida;";
        $usuario->horas_asignadas=9;
        $usuario->tf_asignada=4;
        $usuario->tf_asignada2=null;
        $usuario->zona=1;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Lola";
        $usuario->apellidos="Garcia ";
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->telefono=365498745;
        $usuario->dni="58741236L";
        $usuario->persona_contacto="Paco (hijo): 654874521";
        $usuario->detalle="Persona con discapacidad del 33% que vive sola, necesita ayuda en las AVD, PRINCIPIOS de alzheimer";
        $usuario->tareas="Acompañamiento en la compra; Hacer la comida;";
        $usuario->horas_asignadas=4;
        $usuario->tf_asignada=6;
        $usuario->tf_asignada2=null;
        $usuario->zona=2;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Camelia";
        $usuario->apellidos="Jimenez Martinez";
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->telefono=487498745;
        $usuario->dni="85210365J";
        $usuario->persona_contacto="Esther (hija): 654874521";
        $usuario->detalle="Persona con alzheimer avanzado. vive con el marido, necesita acompañamiento para salir e higiene diaria";
        $usuario->tareas="Acompañamiento paseo; Higiene; Hacer la comida;";
        $usuario->horas_asignadas=9;
        $usuario->tf_asignada=7;
        $usuario->tf_asignada2=6;
        $usuario->zona=2;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Dolors";
        $usuario->apellidos="Fabrega Mora";
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->telefono=620147789;
        $usuario->dni="74569852J";
        $usuario->persona_contacto="Gemma (hija): 654874521";
        $usuario->detalle="Persona con discapacidad del 20%, problemas de mobilidad. vive con el marido, necesita acompañamiento para salir e higiene diaria";
        $usuario->tareas="Acompañamiento paseo; Acompañamiento compras; Hacer la comida;";
        $usuario->horas_asignadas=9;
        $usuario->tf_asignada=8;
        $usuario->tf_asignada2=9;
        $usuario->zona=3;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->nombre="Pastora";
        $usuario->apellidos="Granados Martin";
        $usuario->direccion="C/ Piruleta 12 5º5º";
        $usuario->telefono=936541789;
        $usuario->dni="74125896G";
        $usuario->persona_contacto="Maria (hija): 654874521";
        $usuario->detalle="Persona 99 años que vive sola, tiene dos hijas que viven cerca, necesita ayuda con algunas de las AVD";
        $usuario->tareas="Acompañamiento paseo; Acompañamiento compras; Hacer la comida;";
        $usuario->horas_asignadas=9;
        $usuario->tf_asignada=8;
        $usuario->tf_asignada2=null;
        $usuario->zona=3;
        $usuario->save();
    }
}
