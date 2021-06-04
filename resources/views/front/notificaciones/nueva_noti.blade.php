<div class="modal fade" id="nuevaNoti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row container-fluid p-0">
                    <div class="col-6">
                        <p>Nueva notificación</p>
                    </div>
                    <div class="col-6 justify-content-end d-flex p-0">
                        <a href="">
                            <img class="close-cross" src="{{asset('/img/icons/X.png')}}" alt="salir">
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{route('notificaciones.nueva')}}" method="POST" class="form needs-validation">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-12 col-md-2">
                                    <p class="first-text">Para:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    @if(isset($users))
                                    <select name="para" type="text" class="content-text mr-sm-2" required>
                                        <option value=''>Elija un/a trabajador/a</option>
                                        @foreach ($users as $u )
                                        <option value={{$u->id}}>{{$u->nombre}} {{$u->apellidos}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-md-2">
                                    <p class="first-text">Asunto:</p>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input name="asunto" type="text" class="content-text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <p class="first-text">Mensaje:</p>
                                    <small class="text-muted"><em>(Máx. 500)</em></small>
                                </div>
                                <div class="col-12">
                                    <textarea class="textarea-write" maxlength="500" rows="7" cols="41" name="detalle" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <p class="first-text">Prioridad alta:&nbsp;<span><input class="form-check-input" type="checkbox" name="prioridad" id="checkPrioridad"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row container-fluid d-flex justify-content-end">
                        <button type="submit" class="btn btn-general">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
