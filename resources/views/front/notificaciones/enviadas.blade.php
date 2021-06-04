@extends('layouts.master')
@include('front.notificaciones.nueva_noti', ['users' => $users])
@include('front.notificaciones.popUpLeerNoti')
@section('content')
<section class="notificaciones">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row d-flex align-items-center justify-content-center mb-5">
                <div class="col-12 text-center col-md-9 text-md-left">
                    <p class="home-title">NOTIFICACIONES ENVIADAS</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#">
                            <button class="btn btn-general" id="nuevaNotificacion" data-toggle="modal" data-target="#nuevaNoti">Crear nueva</button>
                        </a>
                    </div>
                </div>
            </div>
            @if(isset($notificaciones))
                @if(count($notificaciones) != 0)
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <p class="first-home-txt">Enviadas</p>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Para:</th>
                                    <th>Asunto:</th>
                                    <th class="oculta">Prioridad:</th>
                                    <th class="oculta">Fecha:</th>
                                    <th>Abrir:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notificaciones as $n )
                                <tr>
                                    <th>{{$n->nombre}} {{$n->apellidos}}</th>
                                    <th>{{$n->asunto}}</th>
                                    <th class="oculta">
                                        @if ($n->prioridad == 0)
                                            Normal
                                        @else
                                            Alta
                                        @endif
                                    </th>
                                    <th class="oculta">{{$n->fecha}}</th>
                                    <th class="d-flex justify-content-center">
                                        <a href="#" class="leerNotificacion verEnviada" data-noti={{$n->id}} data-toggle="modal" data-target="#ver">
                                            <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                        </a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 d-flex justify-content-end">
                        {!!$notificaciones->links()!!}
                    </div>
                </div>
                @else
                    <script type="text/javascript">
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No tienes notificaciones enviadas'
                        })
                    </script>
                    <div class="col-12 d-flex justify-content-center">
                        <p class="content-text">No has enviado ninguna notificación</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
@endsection
