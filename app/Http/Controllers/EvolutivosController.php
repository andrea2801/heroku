<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class EvolutivosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function create(Request $request){
        $create = DB::table('evolutivos')->insert([
            'fecha_creacion' => Carbon::now(),
            'descripcion' => $request->evolucion,
            'id_usuario' => $request->usuario
        ]);
        if($create == false){
            Session::flash('Eerror', 'Error al crear evolutivo');
        }
        return back()->withInput();
    }

    protected function view(Request $request){
        $evolutivos=DB::table('evolutivos')
                ->where('id', $request->id)
                ->get();

        return $evolutivos;
    }


}
