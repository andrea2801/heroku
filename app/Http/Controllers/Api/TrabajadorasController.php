<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TrabajadorasController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadoras = User::all();
        if (!$trabajadoras) {
            return response()->json([
                'success' => false,
                'message' => 'No hay trabajadoras'
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $trabajadoras->toArray()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dni =  User::where('dni', $request->dni)->exists();
        $email =  User::where('email', $request->email)->exists();
        if($dni===true){
            return response()->json([
                'success' => false,
                'message' => 'El dni que ha escrito ya existe: ',['dni' => $request->dni]
            ], 200);
        }
        if($email ===true){
            return response()->json([
                'success' => false,
                'message' => 'El email que ha escrito ya existe: ',['email' => $request->email]
            ], 200);
        }

        $trabajadora = new User();
        $trabajadora->nombre= $request->nombre;
        $trabajadora->apellidos= $request->apellidos;
        $trabajadora->telefono= $request->telefono;
        $trabajadora->dni= $request->dni;
        $trabajadora->password= Hash::make($request->password);
        $trabajadora->email= $request->email;
        $trabajadora->img= null;
        $trabajadora->zona= $request->zona;
        $trabajadora->rol_id= $request->rol_id;
        $trabajadora->save();
        return response()->json([
            'success' => true,
            'message' => 'Trabajadora creada: ',['nombre' => $request->nombre,'apellidos' => $request->apellidos,'email' => $request->email, 'telefono' => $request->telefono,'dni' => $request->dni,'zona' => $request->zona]
        ], 200);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajadora = User::find($id);

        if (!$trabajadora) {
            return response()->json([
                'success' => false,
                'message' => 'No se ha encontrado la trabajado con la id ' . $id . ', o no existe'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $trabajadora->toArray()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trabajadora = User::find($id);
        if (!$trabajadora) {
            return response()->json([
                'success' => false,
                'message' => 'No se ha encontrado la trabajado con la id ' . $id . ', o no existe'
            ], 400);
        }

        $trabajadora->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'zona' => $request->zona
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Trabajadora actualizada: ',['nombre' => $request->nombre,'apellidos' => $request->apellidos,'email' => $request->email, 'telefono' => $request->telefono,'zona' => $request->zona]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajadora= User::find($id);
        if (!$trabajadora) {
            return response()->json([
                'success' => false,
                'message' => 'No se ha encontrado la trabajado con la id ' . $id . ', o no existe'
            ], 400);
        }
        $trabajadora->delete();
        return response()->json([
            'success' => true,
            'message' => 'Trabajadora eliminada'
        ], 200);
    }

}
