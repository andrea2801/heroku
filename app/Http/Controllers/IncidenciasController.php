<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class IncidenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function create(Request $request){
        $insert=DB::table('incidencias')->insert([
            'created_at' => Carbon::now(),
            'descripcion' => $request->descripcion,
            'id_usuario' => $request->usuario
        ]);

        if($insert == false){
            Session::flash('ierror', 'Error al crear incidencia');
        }
        return back()->withInput();
    }

    protected function closeState($id){
        $result = DB::table('incidencias')->where('id', $id)->update(['estado'=>1, 'updated_at' => Carbon::now()]);
        if( $result == true){
            return back()->withInput();
        }
        return back()->with('message', 'Error al cerrar incidencia');
    }

    protected function delete($id){
        $result = DB::table('incidencias')->where('id', $id)->delete();
        if( $result == true){
            return back()->withInput();
        }
        return back()->with('message', 'Error al eliminar incidencia');
    }
}
