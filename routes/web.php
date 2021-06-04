<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(["register" => false]);

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//usuarios
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios');
Route::get('/usuario/{id}', [App\Http\Controllers\UsuariosController::class, 'show'])->name('usuario');
Route::post('/update', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuario.update');
Route::post('/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuario.crear');
Route::get('/usuario/eliminar/{id}', [App\Http\Controllers\UsuariosController::class, 'delete'])->name('eliminar');
Route::get('/usuarios/busqueda/dni', [App\Http\Controllers\UsuariosController::class, 'searchByDNI'])->name('usuarios.busqueda.dni');
Route::get('/usuarios/busqueda/nombre', [App\Http\Controllers\UsuariosController::class, 'searchByName'])->name('usuarios.busqueda.nombre');

//incidencias
Route::post('/indicendias/nueva', [App\Http\Controllers\IncidenciasController::class, 'create'])->name('crear.incidencia');
Route::get('/cerrar/{id}', [App\Http\Controllers\IncidenciasController::class, 'closeState'])->name('cerrar');
Route::get('/eliminar/{id}', [App\Http\Controllers\IncidenciasController::class, 'delete'])->name('eliminar');

//evolutivos
Route::post('/evolutivos/nuevo', [App\Http\Controllers\EvolutivosController::class, 'create'])->name('crear.evolutivo');
Route::get('/evolutivos/id', [App\Http\Controllers\EvolutivosController::class, 'view']);

//trabajadoras
Route::get('/trabajadoras', [App\Http\Controllers\TrabajadorasController::class, 'index'])->name('trabajadoras.index');
Route::post('/trabajadoras/store', [App\Http\Controllers\TrabajadorasController::class, 'store'])->name('trabajadoras.store');
Route::get('/trabajadoras/busqueda', [App\Http\Controllers\TrabajadorasController::class, 'trabajadorasFiltrar'])->name('trabajadoras.todas');
Route::get('/trabajadoras/busqueda/dni', [App\Http\Controllers\TrabajadorasController::class, 'dniBuscar'])->name('trabajadoras.dni');
Route::get('/trabajadoras/busqueda/rol', [App\Http\Controllers\TrabajadorasController::class, 'employeeByRole'])->name('trabajadoras.role');
Route::get('/trabajadoras/users{id}', [App\Http\Controllers\TrabajadorasController::class, 'showTFusers'])->name('trabajadoras.users');
Route::get('/trabajadoras/eliminar/{id}', [App\Http\Controllers\TrabajadorasController::class, 'delete']);
Route::get('/trabajadoras/users', [App\Http\Controllers\TrabajadorasController::class, 'showTFusers'])->name('trabajadoras.showTFusers');
Route::get('/trabajadoras/trabajadora', [App\Http\Controllers\TrabajadorasController::class, 'edit'])->name('trabajadoras.edit');
Route::post('/trabajadoras/update', [App\Http\Controllers\TrabajadorasController::class, 'update'])->name('trabajadoras.update');

Route::get('/trabajadoras/alta', function (){
    return view('front/usuarios_trabajadora/ts/alta');
})->name('alta_nueva');
Route::get('/trabajadoras/busqueda/usuario', function (){
    return view('front/usuarios_trabajadora/ts/busqueda');
})->name('busqueda_usuarios');

//horarios
Route::get('/horarios',function (){
    return view('front/horarios/horarios_cord');
})->name('horarios');

//notificaciones
Route::get('/notificaciones/enviadas', [App\Http\Controllers\NotificacionesController::class, 'viewSent'])->name('notificaciones.enviadas');
Route::get('/notificaciones/enviadas/ver', [App\Http\Controllers\NotificacionesController::class, 'showSent'])->name('notificaciones.leerEnviada');
Route::post('/notificaciones/nueva', [App\Http\Controllers\NotificacionesController::class, 'create'])->name('notificaciones.nueva');
Route::get('/notificaciones/ver/', [App\Http\Controllers\NotificacionesController::class, 'show'])->name('notificaciones.ver');
Route::get('/notificaciones/estado/', [App\Http\Controllers\NotificacionesController::class, 'changeState'])->name('notificaciones.ver');

//notas
Route::post('/notas/nueva', [App\Http\Controllers\NotasController::class, 'create'])->name('crear.nota');
Route::get('/notas/eliminar/{id}', [App\Http\Controllers\NotasController::class, 'delete'])->name('nota.eliminar');
Route::get('/notas/id', [App\Http\Controllers\NotasController::class, 'view']);
