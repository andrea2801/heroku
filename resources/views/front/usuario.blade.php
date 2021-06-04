@extends('layouts.master')

@section('content')
<section class="usuarios">
    <div class="row container-principal">
        <div class="col-12">
            @if (Auth::user()->rol_id == 1)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <p class="title-user">Usuarios</p>
                    </div>
                    @foreach ($usuario as $u )
                        <div class="col-12 col-md-10">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="subtitle-user">Usuario: {{$u->apellidos}}, {{$u->nombre}}</p>
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0 d-flex justify-content-start justify-content-md-end">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-general" id="update">Modificar usuario</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="/usuario/eliminar/{{$u->id}}" id="bajaUsuario">
                                            <button type="button" class="btn btn-general" >Dar de baja</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (Auth::user()->rol_id == 1)
                @include('front.usuarios_trabajadora.coordinadora.usuario', ['usuario' => $usuario, 'incidencias' => $incidencias, 'evolutivos' => $evolutivos,'tfs' => $tfs])
            @elseif (Auth::user()->rol_id == 2)
                @include('front.usuarios_trabajadora.tf.usuario', ['usuario' => $usuario, 'notas' => $notas])
            @endif

            @if(Session::has('errorCarga'))
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups!',
                        text: {!!Session::get('errorCarga')!!}
                    })
                </script>
            @endif
        </div>
    </div>
</section>
@endsection
