@if (Auth::user()->id == 3)
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
                    <p class="subtitle-search">Nuevo Usuario</p>
                    <hr>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-10 container-border p-5">
                        <form action="{{route('usuario.crear')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row p-5">
                            <div class="col-12">
                                <p class="first-text">Nombre:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <input class="info-content text-general p-2" name="name" title="Porfavor, introduce un nombre" type="text">
                            </div>
                            <div class="col-12">
                                <p class="first-text">Apellidos:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <input class="info-content text-general p-2" name="subname" title="Porfavor, introduce apellidos" required type="text">
                            </div>
                            <div class="col-12">
                                <p class="first-text">Dirección:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <input class="info-content text-general p-2" name="direction" title="Porfavor, introduce una dirección" required type="text">
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-2">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12 col-md-4">
                                                <p class="first-text">DNI/NIE:</p>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input class="info-content text-general p-2 validarDniNie" title="Porfavor, introduce DNI o NIE" name="dni" required type="text">
                                            </div>
                                            <div class="col-12 col-md-8 errorDniNie">
                                                <p class="normal-text">Porfavor, asegúrate que el formato es correcto</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12 col-md-4">
                                                <p class="first-text">Telefóno:</p>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input class="info-content input-num text-general p-2" required title="Porfavor, introduce un teléfono" minlength="9" maxlength="9" name="telf" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Persona de contacto:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <input class="info-content text-general p-2" name="contact" title="Introduce un contacto, si no tiene indica que no" required type="text">
                            </div>
                            <div class="col-12">
                                <p class="first-text">Horas asignadas:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <input class="info-content text-general p-2" name="hours" title="Porfavor, introduce un número" required type="number">
                            </div>
                            <div class="col-12">
                                <p class="first-text">Detalle:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <textarea class="txtarea-write info-content text-general p-2" rows="3" title="Porfavor, introduce la descripción" name="detail" maxlength="500"></textarea>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Tareas:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <textarea class="txtarea-write info-content text-general p-2" name="chores" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <p class="first-text">Zona:</p>
                            </div>
                            <div class="col-12 mb-2">
                                <select class="content-text" title="Porfavor, selecciona una zona" name="zone" required>
                                    <option value="1">Zona I (Clot)</option>
                                    <option value="2">Zona II (Sant Martí)</option>
                                    <option value="3">Zona III (Sagrada Familia)</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-10 mt-5">
                    <div class="row d-flex justify-content-end">
                        <div class="col-4 col-md-2 p-0">
                            <a href="#">
                                <button class="btn btn-general btn-alta p-2">Crear alta</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    @if(Session::has('created'))
        <script type="text/javascript">
            Swal.fire({
                    icon: 'success',
                    title: 'Done :)',
                    text: 'Usuario dado de alta'
                })
            </script>
        @elseif(Session::has('createdError'))
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Ups!',
                    text: 'Error al crear alta, inténtalo de nuevo :('
                })
            </script>
    @endif
</section>
@endsection
@else
    <script>
        window.location ='/home';
    </script>
@endif
