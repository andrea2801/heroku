<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $new = $this->viewNew();
        $pending = $this->viewPending();
        $users = DB::table('users')->select('id', 'nombre', 'apellidos')->get();
        return view('home')->with('new', $new)->with('pending', $pending)->with('users', $users);
    }

    protected function viewNew(){
        $notification=DB::table('notificaciones')
                        ->join('users', 'notificaciones.creador', '=', 'users.id')
                        ->select('notificaciones.*', 'users.nombre', 'users.apellidos')
                        ->where('estado', 0)->where('destinatario', Auth::user()->id)->orderBy('prioridad')->paginate(10);
        return $notification;
    }

    protected function viewPending(){
        $notification=DB::table('notificaciones')
                        ->join('users', 'notificaciones.creador', '=', 'users.id')
                        ->select('notificaciones.*', 'users.nombre', 'users.apellidos')
                        ->where('estado', 1)->where('destinatario', Auth::user()->id)->orderBy('prioridad')->paginate(10);
        return $notification;
    }

}
