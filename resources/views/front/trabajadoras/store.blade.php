<div class="modal fade" id="nueva">
    <div class="modal-dialog">
        <div class="modal-content content-box">
            <div class="modal-header">
                <h4>Nueva Trabajadora</h4>
            </div>
            <form action="{{route('trabajadoras.store')}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <p class="first-text">Nombre: <span><input name="nombre" type="text" value="{{old('nombre')}}" class="content-text" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Apellidos: <span><input name="apellidos" type="text" value="{{old('apellidos')}}" class="content-text" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">DNI/NIF: <span><input name="dni" type="text" value="{{old('dni')}}" class="content-text validarDniNie" required></span></p>
                            <span class="normal-text">{{ $errors->first('dni') }}</span>
                        </div>
                        <div class="col-12 col-md-8 errorDniNie">
                            <p class="normal-text">Porfavor, asegúrate que el formato es correcto</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Teléfono: <span><input name="telefono" type="number" value="{{old('telefono')}}" class="content-text"  minlength="9" required></span></p>
                            <span class="normal-text">{{ $errors->first('telefono') }}</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Email: <span><input name="email" type="email" value="{{old('email')}}" class="content-text" required></span></p>
                            <span class="normal-text">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Password: <span><input name="password" type="password" value="{{old('password')}}" class="content-text" minlength="8" required></span></p>
                            <span class="normal-text">{{ $errors->first('password') }}</span>
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
                            <span class="normal-text">{{ $errors->first('zona') }}</span>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Rol:
                                <span>
                                    <select class="content-text" title="Porfavor, selecciona un rol" name="rol_id" required>
                                        <option value="1">Coordinadora</option>
                                        <option value="2">Trabajadora Familiar</option>
                                        <option value="3">Trabajadora social</option>
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
                            <span class="normal-text">{{ $errors->first('img') }}</span>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row all-content d-flex justify-content-end">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-general">Añadir</button>
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
<script>
    $(document).ready(function(){

        @if (count($errors->all())>0)
        document.getElementById("btn-nueva").click();
        @endif
    });
</script>
@if(Session::has('done'))
        <script type="text/javascript">
            Swal.fire({
                    icon: 'success',
                    title: 'Done :)',
                    text: 'Trabajadora creada'
                })
            </script>
        @elseif(Session::has('error'))
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Ups!',
                    text: 'Error al crear trabajadora, inténtalo de nuevo :('
                })
            </script>
    @endif
