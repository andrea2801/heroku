<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function create(Request $request){
        $isCreated=DB::table('notas')->insert(array(
            'nota' => $request->nota,
            'fecha' => Carbon::now(),
            'id_usuario' => $request->usuario,
            'id_tf' => Auth::user()->id
        ));

        if($isCreated != true){
            Session::flash('noteError', 'Error de creación');
        }
        return redirect('usuario/'.$request->usuario);
    }

    protected function delete($id){
        $isDeleted = DB::table('notas')->where('id', $id)->delete();
        if ($isDeleted == true){
            return back()->with('message', 'Nota eliminada');
        }
        return back()->with('message', 'Error al eliminar la nota');
    }

    protected function view(Request $request){
        $notas=DB::table('notas')
                ->where('id', $request->id)
                ->get();
        return $notas;
    }
}
