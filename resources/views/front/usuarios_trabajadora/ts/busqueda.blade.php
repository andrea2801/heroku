@if (Auth::user()->id != 2)
@extends('layouts.master')
@section('content')
<section class="usuarios_ts">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row d-flex align-items-center justify-content-center mb-3">
                <div class="col-12 col-md-10">
                    <p class="title-search">Usuarios</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <p class="subtitle-search">Búsqueda de usuarios</p>
                    <hr>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-12 col-md-3 offset-0 offset-md-1">
                    <p class="dni_search">Buscar por DNI:</p>
                </div>
                <div class="col-12 col-md-5 mb-5">
                    <div class="row">
                        <div class="col-8 col-md-6 pr-0">
                            <input id="dni_search" type="text" class="form-control" min="9" max="9" name="dni" required autocomplete="dni">
                        </div>
                        <div class="col-4 col-md-6 pl-0">
                            <button class="btn_search" type="submit" id="search_user"><img class="lupa" src="{{asset('img/icons/lupa.png')}}" alt="lupa"></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 offset-0 offset-md-1">
                    <p class="dni_search">Buscar por Nombre y apellidos:</p>
                </div>
                <div class="col-12 col-md-5 mb-5">
                    <div class="row">
                        <div class="col-4 col-md-5 pr-0">
                            <input id="name_search" type="text" class="form-control" name="name" required autocomplete="name" placeholder="Nombre">
                        </div>
                        <div class="col-4 col-md-5 pr-0">
                            <input id="subname_search" type="text" class="form-control" name="subname" required autocomplete="subname" placeholder="Apellidos">
                        </div>
                        <div class="col-4 col-md-2 pl-0">
                            <button class="btn_search" type="submit" id="search_user_name"><img class="lupa" src="{{asset('img/icons/lupa.png')}}" alt="lupa"></button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-5 ">
                    <div class="col-10 container-border p-5 user_info">
                        <div class="row p-5">
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-12 text-right mb-5">
                                        <img id="cross" class="close-cross" src="{{asset('/img/icons/X.png')}}" alt="salir">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p class="name-user" id="user_name"></p>
                                    </div>
                                    <div class="col-12 col-md-6 text-left text-md-right">
                                        <p class="text-general p-2" id="user_dni"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-7">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12 col-md-4">
                                                <p class="first-text">Dirección:</p>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="info-content text-general p-2" id="user_direction"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12 col-md-4">
                                                <p class="first-text">Telefóno:</p>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="info-content text-general p-2" id="user_telf"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Persona de contacto:</p>
                            </div>
                            <div class="col-12">
                                <p class="info-content text-general p-2" id="user_contact"></p>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Horas asignadas:</p>
                            </div>
                            <div class="col-12">
                                <p class="info-content text-general p-2" id="user_hours"></p>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Fecha de alta:</p>
                            </div>
                            <div class="col-12">
                                <p class="info-content text-general p-2" id="user_created_at"></p>
                            </div>
                            <div class="col-12">
                                <p class=first-text">Detalle:</p>
                            </div>
                            <div class="col-12">
                                <textarea class="info-content-txtarea info-content text-general p-2" rows="3" readonly id="user_detail"></textarea>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Tareas:</p>
                            </div>
                            <div class="col-12">
                                <textarea class="info-content-txtarea info-content text-general p-2" rows="3" readonly id="user_chores"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@else
    <script>
        window.location ='/home';
    </script>
@endif
