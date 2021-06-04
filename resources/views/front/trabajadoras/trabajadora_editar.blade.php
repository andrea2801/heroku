<div class="modal fade" id="trabajadora">
    <div class="modal-dialog">
        <div class="modal-content content-box">
            <div class="modal-header">
                <h4>Editar Trabajadora</h4>
            </div>
            <form action="{{route('trabajadoras.update')}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="id" type="hidden"  value="">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <p class="first-text">Nombre: <span><input name="nombre" type="text" value="" class="content-text" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Apellidos: <span><input name="apellidos" type="text" value="" class="content-text" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Teléfono: <span><input name="telefono" type="number" value="" class="content-text"  minlength="9" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Email: <span><input name="email" type="email" value="" class="content-text" required></span></p>
                        </div>
                        <div class="col-12">
                            <div class="changePassword mt-3 mb-4">
                                <button type="button" class="btn btn-general">Cambiar password</button>
                            </div>
                            <div class="row password">
                                <div class="col-12">
                                    <p class="first-text">Password:
                                </div>
                                <div class="col-8">
                                        <span>
                                            <input name="password" type="text" value="" class="content-text"  minlength="8">
                                        </span>
                                    </p>
                                </div>
                                <div class="col-4">
                                    <p class="normal-text">Cancelar <img class="close-cross cancelPwd" src="{{asset('/img/icons/X.png')}}" alt="salir"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Zona:
                                <span>
                                    <select class="content-text" title="Porfavor, selecciona una zona" name="zona" required>
                                        <option value="1">Zona I (Clot)</option>
                                        <option value="2">Zona II (Sant Martí)</option>
                                        <option value="3">Zona III (Sagrada Familia)</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Foto de perfil:
                                <span>
                                    <input type="file" name="img" accept="image/*" class="content-text" lang="es">
                                </span>
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row all-content d-flex justify-content-end">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-general">Guardar</button>
                                            </div>
                                            <div class="col-6">
                                                <button data-dismiss='modal' type="button" class="btn btn-general bg-danger">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if(Session::has('updated'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Done!',
            text: 'Trabajadora modificada'
        })

    </script>
@elseif(Session::has('updated'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Ups!',
        text: 'Error al modificar trabajadora :('
    })

</script>
@endif
