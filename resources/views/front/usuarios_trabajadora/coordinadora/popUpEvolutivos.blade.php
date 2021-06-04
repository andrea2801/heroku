<div class="modal fade" id="evolutivos">
    <div class="modal-dialog">
        <div class="modal-content content-box">
            <div class="modal-header">
                <h4>Nuevo evolutivo</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('crear.evolutivo')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach ($usuario as $u )
                        <div class="form-group row">
                            <div class="col-12">
                                <p>Evolución de <strong>{{$u->nombre}} {{$u->apellidos}}</strong>:</p>
                            </div>
                            <div class="col-12">
                                <textarea name="evolucion" class="form-control" maxlength=150 rows="4" required></textarea>
                            </div>
                            <input type="hidden" name="usuario" value="{{$u->id}}">
                            @foreach ($tfs as $tf )
                                <input type="hidden" name="tf" value={{$tf->id}}>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-10">
                                    <div class="row all-content d-flex justify-content-end">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-general">Crear</button>
                                        </div>
                                        <div class="col-6">
                                            <button data-dismiss='modal' type="button" class="btn btn-general bg-danger">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
