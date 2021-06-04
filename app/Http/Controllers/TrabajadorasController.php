<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class TrabajadorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $tfs = $this->showTFS();
        return view('front/trabajadoras/index')->with('tfs', $tfs);
    }
    public function store(Request $request) {
        $inputs=$request->all();

        $textError = [
            'password.min'=> 'Mínimo 8 letras',
            'dni.unique' => 'DNI duplicado',
            'email.unique' => 'Este email ya existe'
        ];

        $rules = [
            'password' => 'required|min:8',
            'dni' => 'required|unique:users,dni',
            'email' => 'email|unique:users,email'
        ];

        if($request->hasFile('img')){
            $textError['img.dimensions'] = 'Imagen muy grande(250px)';
            $rules['img'] = "dimensions:max_width=250,max_height=250,'image','mimes:jpg,png,jpeg,gif'";
        }
        request()->validate($rules, $textError);


        if($request->hasFile('img')){

            $file=$request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenUser/',$name);
            $inputs['img']=$name;
        }
        $inputs['password']=bcrypt($inputs['password']);
        $create=User::create($inputs);
        if($create == true){
            Session::flash('done', 'creado');
        }else{
            Session::flash('error', 'error');
        }
        return redirect(route('trabajadoras.index'));
    }

    protected function showTFS(){
       $tfs = DB::table('users')->where('rol_id', 2)->where('zona', Auth::user()->zona)->get();
       return $tfs;
    }

    protected function showTFusers(Request $request){
        $users=DB::table('usuarios')->select('id', 'nombre', 'apellidos', 'direccion', 'telefono', 'detalle', 'tareas')->where('tf_asignada', $_GET['id'])->orWhere('tf_asignada2', $_GET['id'])->get();
        if($users == false){
            Session::flash('error', 'error al obtener datos');
        }
        return view('front/trabajadoras/show')->with('users', $users);
    }

    //mostrar todas

    public function trabajadorasFiltrar(){
        return view('front/trabajadoras/todas_trabajadoras');
    }

    public function dniBuscar(Request $request){
        $trabajadora = DB::table('users')
            ->where('dni', $request->dni)
            ->get();

        if(count($trabajadora) == 0){
            $data = [ 'trabajadora' => null];
        } else {
            $id=$trabajadora[0]->id;
            $users=DB::table('usuarios')
                ->select('nombre','apellidos')
                ->where('tf_asignada', $id)
                ->orWhere('tf_asignada2',  $id)
                ->get();
            $data = [ 'trabajadora' => $trabajadora, 'users' => $users];
        }

        return $data;
    }

    public function employeeByRole(Request $request){
        $trabajadora = DB::table('users')
            ->select()
            ->where('rol_id', $request->id)
            ->get();
        $data = [ 'trabajadora' => $trabajadora];
        return $data;
    }

     protected function delete($id){
        if (DB::table('usuarios')->where('tf_asignada', $id)->exists()) {
            $update=DB::table('usuarios')->where('tf_asignada', $id)->update([
                'tf_asignada' => null
            ]);

        }
        if (DB::table('usuarios')->where('tf_asignada2', $id)->exists()) {
            $update=DB::table('usuarios')->where('tf_asignada2', $id)->update([
                'tf_asignada2' => null
            ]);
        }
        DB::table('users')
                ->where('id', $id)
                ->delete();
            return back()->with('message', 'Eliminado');

    }
    protected function edit(){
        $trabajadora = DB::table('users')
        ->select()
        ->where('id', $_GET['id'])
        ->get();
        return  $trabajadora;

    }
    protected function update(Request $request){
        if($request->password == null){
            $password = DB::table('users')->select('password')->where('id', $request->id)->get();
        } else {
            $password = bcrypt($request->password);
        }
        $update=DB::table('users')->where('id', $request->id)->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'zona' => $request->zona,
            'password' => $password,
            'updated_at' => Carbon::now()
        ]);
        if($update == true){
            Session::flash('updated', 'ok');
        } else {
            Session::flash('error', 'error');
        }
        return redirect(route('trabajadoras.todas'));
    }

}
