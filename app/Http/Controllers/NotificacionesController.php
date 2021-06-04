<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NotificacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function viewSent(){
        $notification=DB::table('notificaciones')->join('users', 'users.id', '=', 'destinatario')->where('creador', Auth::user()->id)
                            ->select('notificaciones.*', DB::raw('users.nombre AS nombre, users.apellidos AS apellidos'))->paginate(10);
        $users=DB::table('users')->select('id', 'nombre', 'apellidos')->get();

        return view('front/notificaciones/enviadas')->with('notificaciones', $notification)->with('users', $users);
    }

    protected function create(Request $request){
        if($request->prioridad != null){
            $prioridad = 1;
        }else{
            $prioridad = 0;
        }
        $isCreated=DB::table('notificaciones')->insert(
            array(
                'asunto' => $request->asunto,
                'detalle' => $request->detalle,
                'creador' => Auth::user()->id,
                'destinatario' => $request->para,
                'prioridad' => $prioridad,
                'fecha' => Carbon::now()
            )
        );
        if($isCreated == true){
            return back()->with('message', 'Modificado');
        }
        return back()->with('message', 'Error al enviar notificacion');
    }

    protected function show (Request $request){
        $notification=DB::table('notificaciones')
                        ->join('users', 'users.id', '=', 'creador')
                        ->where('notificaciones.id', $request->notification)
                        ->select('notificaciones.*', DB::raw('users.nombre AS nombre, users.apellidos AS apellidos'))
                        ->get();

        return $notification;

    }

    protected function showSent (Request $request){
        $notification=DB::table('notificaciones')->join('users', 'users.id', '=', 'destinatario')
                            ->where('notificaciones.id', $request->notification)
                            ->select('notificaciones.*', DB::raw('users.nombre AS nombre, users.apellidos AS apellidos'))
                            ->get();

        return $notification;
    }

    protected function changeState (Request $request){
        $notification=DB::table('notificaciones')
                        ->where('id', $request->notification)
                        ->update(['estado'=> 1 ]);

        return $notification;
    }
}
