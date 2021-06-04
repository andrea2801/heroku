@if (Auth::user()->rol_id == 1)
@extends('layouts.master')

@section('content')
<section class="trabajadoras">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12">
                            <p class="title-user">Trabajadoras</p>
                        </div>
                        <div class="col-12">
                            <p class="subtitle-user">Todas las trabajadoras</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10" id="filtrar_block">
                    <div class="row">
                        <div class="col-12">
                            <p class="first-text">Busqueda</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="normal-text">Por DNI: </p>
                            <span>
                                <input id="employee_search" type="text" class="content-text" name="dni" required>
                                <img class="buscar_dni" src="{{asset('img/icons/buscar.png')}}" alt="buscar">
                            </span>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <p class="normal-text">Por departamento: </p>
                            <select id="select_roles" class="content-text" name="select_roles">
                                <option selected="" value="default" active>Selecciona</option>
                                <option value="1">Coordinadora</option>
                                <option value="2">Trabajadora Familiar</option>
                                <option value="3">Trabajadora Social</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-10 mt-5" id="tabla_filtrar">
                    <table class="table table-striped table-responsive-sm">
                        <thead class="tabla_trabajadoras">
                            <tr></tr>
                        </thead>
                        <tbody class="info_filtrar"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="usuario">
        <div class="modal-dialog">
            <div id="usuariocontent" class="modal-content">
            </div>
        </div>
    </div>
    @include('front.trabajadoras.trabajadora_editar')
</section>

<!--funcion para mostrar los usuarios y otra de trabajadores-->
<script type="text/javascript">
    function usuarios(id) {
        $.ajax({
            url: "{{Route('trabajadoras.showTFusers')}}",
            data: `id=${id}`,
            type: "GET",
            success: function (data) {
                $("#usuariocontent").html(data);
            }
        });
    }
    function trabajadoras(id) {
        $.ajax({
            url: "{{Route('trabajadoras.edit')}}",
            data: `id=${id}`,
            type: "GET",
            success: function (data) {
                var nombre = data[0].nombre;
                var apellidos = data[0].apellidos;
                var email = data[0].email;
                var telefono = data[0].telefono;
                var zona = data[0].zona;
                var id = data[0].id;
                $("#trabajadora input[name=nombre]").val(nombre);
                $("#trabajadora input[name=apellidos]").val(apellidos);
                $("#trabajadora input[name=telefono]").val(telefono);
                $("#trabajadora input[name=email]").val(email);
                var $radios = $('#trabajadora input:radio[name=zona]');
                $radios.filter('[value=' + zona + ']').prop('checked', true);
                $("#trabajadora input[name=id]").val(id);
            }
        });
    }

</script>
@endsection
@else
    <script>
        window.location ='/home';
    </script>
@endif
