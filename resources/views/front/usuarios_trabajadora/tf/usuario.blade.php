@if (Auth::user()->rol_id == 2)
@include('front.usuarios_trabajadora.tf.popUpNotas', ['usuario' => $usuario])
<section>
    <div class="row container-principal">
        <div class="col-12">
            <div class="row justify-content-center">
                @if(isset($usuario))
                    @foreach ($usuario as $u )
                        <div class="col-12">
                            <p class="title-user">Usuarios</p>
                        </div>
                        <div class="col-12 mb-5">
                            <p class="subtitle-user">Usuario: {{$u->apellidos}}, {{$u->nombre}}</p>
                            <hr>
                        </div>
                            <div class="col-12 col-md-10 content-box p-5 mb-5 mt-5">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <p class="first-text">Dirección:</p>
                                        <p class="content-text p-3">{{$u->direccion}}</p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="first-text">Detalle:</p>
                                        <textarea class="content-text p-3" rows="4" readonly>{{$u->detalle}}</textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p class="first-text">Tareas:</p>
                                        <textarea class="content-text p-3" rows="4" readonly>{{$u->tareas}}</textarea>
                                    </div>
                                </div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 mt-5">
                    @if(isset($notas))
                        <div class="modal fade" id="verNota">
                            <div class="modal-dialog">
                                <div class="modal-content content-box" id="notaContent"></div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <p class="first-text">Notas</p>
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="#" class="card-link mt-5" data-toggle="modal" data-target="#notas">
                                            <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                @if(count($notas) == 0)
                                    <p>No hay notas para mostrar.</p>
                                @else
                                    <div class="row justify-content-center">
                                        @foreach ($notas as $nota)
                                                <div class="col-10 col-md-3 card mb-3 p-0 mr-4 ml-5">
                                                    <div class="card-header modal-header">{{$nota->fecha}}</div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">Nota</h5>
                                                        @if(strlen($nota->nota)<=13)
                                                        {{$nota->nota}}
                                                      @else
                                                      <p class="card-text text-secondary">{{substr($nota->nota,0, 13)}}
                                                        <a href="" class="verNota text-decoration-none" data-toggle="modal" data-target="#verNota" data-idnota="{{$nota->id}}">
                                                            <span class="text-info">...ver</span>
                                                        </a>
                                                    </p>
                                                      @endif
                                                        <div class="card-footer text-right">
                                                            <a class="text-danger text-decoration-none" href="/notas/eliminar/{{$nota->id}}">Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</section>
@else
    <script>
        window.location ='/home';
    </script>
@endif

