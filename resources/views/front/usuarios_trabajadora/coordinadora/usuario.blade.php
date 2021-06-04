@if (Auth::user()->id == 1)
@if(isset($usuario))
@include('front.usuarios_trabajadora.coordinadora.popUpEvolutivos', ['usuario' => $usuario, 'tfs' => $tfs])
@include('front.usuarios_trabajadora.coordinadora.popUpIncidencias', ['usuario' => $usuario, 'tfs' => $tfs])
<section class="cord_user">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-6">
                    @foreach ($usuario as $u )
                    <form class="content-box p-5" method="POST" action={{route('usuario.update')}}>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-right dni">{{$u->dni}}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="first-text">Dirección:</p>
                                <p class="content-text p-3">{{$u->direccion}}</p>
                                <label class="edit-text mr-5">Modificar dirección:</label>
                                <input class="edit-input" type="text" name="direccion" value="{{$u->direccion}}">
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="first-text">Teléfono:</p>
                                <p class="content-text p-3">{{$u->telefono}}</p>
                                <label class="edit-text mr-5">Modificar teléfono:</label>
                                <input class="edit-input" type="number" name="telf" value="{{$u->telefono}}">
                            </div>
                            <div class="col-12 edit-margin">
                                <p class="first-text">Persona de contacto:</p>
                                <p class="content-text p-3">{{$u->persona_contacto}}</p>
                                <label class="edit-text mr-5">Modificar persona de contacto:</label>
                                <input class="edit-input" type="text" name="contacto" value="{{$u->persona_contacto}}">
                            </div>
                            <div class="col-12 edit-margin">
                                <p class="first-text">Detalle:</p>
                                <textarea class="content-text p-3" rows="3" readonly>{{$u->detalle}}</textarea>
                                <label class="edit-text mr-5">Modificar detalle:</label>
                                <textarea class="edit-input" name="detalle" rows="3">{{$u->detalle}}</textarea>
                            </div>
                            <div class="col-12 edit-margin">
                                <p class="first-text">Tareas:</p>
                                <textarea class="content-text p-3" rows="3" readonly>@if($u->tareas == null)No hay tareas asignadas, asignar cuanto antes.@else{{$u->tareas}}@endif</textarea>
                                <label class="edit-text mr-5">Modificar tareas:</label>
                                <textarea class="edit-input" name="tareas" rows="3">{{$u->tareas}}</textarea>
                            </div>
                            <div class="col-12 col-md-6 edit-margin">
                                <p class="first-text">Horas asignadas:</p>
                                <p class="content-text p-3">{{$u->horas_asignadas}}</p>
                                <label class="edit-text mr-5">Modificar horas:</label>
                                <input class="edit-input" type="number" name="horas" value="{{$u->horas_asignadas}}">
                            </div>
                            <div class="col-12 col-md-6 edit-margin">
                                <p class="first-text">TF asignada:</p>
                                <p class="content-text p-3">
                                    @if($u->tfn == null)
                                    No tiene tf asignada
                                    @else
                                    {{$u->tfn}} {{$u->tfa}}
                                    @endif
                                </p>
                                <label class="edit-text mr-5">Elegir nueva TF:</label>
                                <select class="edit-input" name="tf">
                                    @foreach ($tfs as $tf)
                                    <option value="{{$tf->id}}" selected={{$tf->id}}>{{$tf->nombre}} {{$tf->apellidos}}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id" value={{$u->id}}>
                            </div>
                        </div>
                        @endforeach
                        <div class="row mt-5 justify-content-end edit-btn">
                            <div class="col-4">
                                <button class="btn btn-general" type="submit">Guardar cambios</button>
                            </div>
                    </form>
                    <div class="col-3">
                        <a class="btn btn-general bg-danger" id="cancel">Cancelar</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12 col-md-6 mt-5 mt-md-0">
                <div class="row">
                    <div class="col-12 mt-5 mt-md-0">
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <p class="first-text">Incidencias</p>
                            </div>
                            <div class="col-2 text-right">
                                <a href="#" class="card-link mt-5" data-toggle="modal" data-target="#incidencias">
                                    <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                @if(isset($incidencias))
                                @if(count($incidencias) == 0)
                                <p>Usuari@ sin incidencias</p>
                                @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Descipcion</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($incidencias as $incidencia )
                                        <tr>
                                            <td>{{$incidencia->created_at}}</td>
                                            <td>
                                                @if($incidencia->estado == 0)
                                                <p>Abierta</p>
                                                @else
                                                <p>Cerrada</p>
                                                @endif
                                            </td>
                                            <td>{{$incidencia->descripcion}}</td>
                                            <td>
                                                @if($incidencia->estado == 0)
                                                <a href="/cerrar/{{$incidencia->idi}}">Cerrar</a>
                                                @else
                                                <a href="/eliminar/{{$incidencia->idi}}">Eliminar</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                @if(isset($evolutivos))
                <div class="modal fade" id="verEvolutiva">
                    <div class="modal-dialog">
                        <div class="modal-content content-box" id="evolutivoContent"></div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <p class="first-text">Evolutivos</p>
                            </div>
                            <div class="col-2 text-right">
                                <a href="#" class="card-link mt-5" data-toggle="modal" data-target="#evolutivos">
                                    <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                </a>
                            </div>
                        </div>
                        <hr>
                        @if(count($evolutivos) == 0)
                        <p>No hay evolutivos</p>
                        @else
                        <div class="row justify-content-center">
                            @foreach ($evolutivos as $evolutivo)
                            <div class="col-10 col-md-3 card mb-3 p-0 mr-4 ml-5">
                                <div class="card-header modal-header">{{$evolutivo->fecha_creacion}}</div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Evolución</h5>
                                    <p class="card-text text-secondary">
                                        @if(strlen($evolutivo->descripcion)<=13)
                                          {{$evolutivo->descripcion}}
                                        @else
                                      {{substr($evolutivo->descripcion,0, 13)}}
                                        <a href="" class="verEvol text-decoration-none" data-toggle="modal"
                                            data-target="#verEvolutiva" data-idevol="{{$evolutivo->id}}">
                                            <span class="text-info">...ver</span>
                                        </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if(Session::has('umodificado'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Done :)',
            text: 'Usuario modificado'
        })

    </script>
    @elseif(Session::has('uerror'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Ups!',
            text: 'Error al modificar usuario, inténtalo de nuevo :('
        })

    </script>
    @endif
    @if(Session::has('Eerror'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Ups!',
            text: 'Error al crear evolutivo:('
        })

    </script>
    @endif
</section>
@else
    <script>
        window.location ='/home';
    </script>
@endif
