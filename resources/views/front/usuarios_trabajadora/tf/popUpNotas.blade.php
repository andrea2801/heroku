<div class="modal fade" id="notas">
    <div class="modal-dialog">
        <div class="modal-content content-box">
            <div class="modal-header">
                <h4>Nueva nota</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('crear.nota')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach ($usuario as $u )
                        <div class="form-group row">
                            <div class="col-12">
                                <p><strong>Nota</strong>:</p>
                            </div>
                            <div class="col-12">
                                <textarea name="nota" type="textarea" maxlength=150 class="form-control" rows="4" required></textarea>
                            </div>
                            <input type="hidden" name="usuario" value={{$u->id}}>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row all-content d-flex justify-content-end">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-general">Añadir nota</button>
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
