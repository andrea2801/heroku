@extends('layouts.master')
@include('front.notificaciones.nueva_noti', ['users' => $users])
@include('front.notificaciones.popUpLeerNoti')
@section('content')
<section class="notificaciones">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row d-flex align-items-center justify-content-center mb-5">
                <div class="col-12 text-center col-md-8 text-md-left">
                    <p class="home-title">NOTIFICACIONES RECIBIDAS</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{route('notificaciones.enviadas')}}">
                            <button class="btn btn-general">Ver enviadas</button>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#">
                            <button class="btn btn-general" id="nuevaNotificacion" data-toggle="modal"
                                data-target="#nuevaNoti">Crear nueva</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <p class="first-home-txt">Nuevas</p>
                    <hr>
                    @if(isset($new))
                        @if(count($new) != 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>De:</th>
                                        <th>Asunto:</th>
                                        <th class="oculta">Prioridad:</th>
                                        <th class="oculta">Fecha:</th>
                                        <th>Abrir:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($new as $notification)
                                    <tr>
                                        <th>{{$notification->nombre}} {{$notification->apellidos}}</th>
                                        <th>{{$notification->asunto}}</th>
                                        <th class="oculta">
                                            @if($notification->prioridad == 0)
                                                Media
                                            @else
                                                Alta
                                            @endif
                                        </th>
                                        <th class="oculta">{{$notification->fecha}}</th>
                                        <th class="d-flex justify-content-center">
                                            <a href="#" class="leerNotificacion" data-noti={{$notification->id}} data-toggle="modal" data-target="#ver">
                                                <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No tienes notificaciones nuevas</p>
                        @endif
                    @endif
                </div>
                <div class="col-12 col-md-10 d-flex justify-content-end">
                    {!!$new->links()!!}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <p class="first-home-txt">Leídas</p>
                    <hr>
                    @if(isset($pending))
                        @if(count($pending) != 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>De:</th>
                                        <th>Asunto:</th>
                                        <th class="oculta">Prioridad:</th>
                                        <th class="oculta">Fecha:</th>
                                        <th>Abrir:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $notification)
                                        <tr>
                                            <th>{{$notification->nombre}} {{$notification->apellidos}}</th>
                                            <th>{{$notification->asunto}}</th>
                                            <th class="oculta">
                                                @if($notification->prioridad == 0)
                                                    Media
                                                @else
                                                    Alta
                                                @endif
                                            </th>
                                            <th class="oculta">{{$notification->fecha}}</th>
                                            <th class="d-flex justify-content-center">
                                                <a href="#" class="leerNotificacion" data-noti={{$notification->id}} data-toggle="modal" data-target="#ver">
                                                    <img class="mas" src="{{asset('img/icons/mas.png')}}" alt="mas">
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No tienes notificaciones leídas</p>
                        @endif
                    @endif
                </div>
                <div class="col-12 col-md-10 d-flex justify-content-end">
                    {!!$pending->links()!!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
