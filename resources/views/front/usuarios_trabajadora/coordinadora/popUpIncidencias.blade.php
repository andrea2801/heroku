<div class="modal fade" id="incidencias">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 >Nueva incidencia</h4>
            </div>
            @foreach ($usuario as $u )
                <div class="modal-body">
                    <form action="{{route('crear.incidencia')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-12">
                                <strong>Descripción:</strong>
                            </div>
                            <div class="col-12">
                                <textarea name="descripcion" type="textarea" class="form-control" rows="5" required></textarea>
                            </div>
                            <input type="hidden" name="usuario" value="{{$u->id}}">
            @endforeach
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
                    </form>
                </div>
        </div>
    </div>
</div>
