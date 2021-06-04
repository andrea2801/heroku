<div class="modal-header">
    <div class='row all-content'>
        <div class='col-12 justify-content-end d-flex'>
           <button type='button' class='close' data-dismiss='modal'><img class='close-cross' src='/img/icons/X.png'></button>
       </div>
       <div class='col-12 text-center'>
            <h4>Usuarios Asignados</h4>
       </div>
   </div>
</div>
<div class="modal-body">
    @if (isset($users))
        @if(count($users) !=0 )
            <ul>
                @foreach ($users as $value)
                    <li>
                        <a href="/usuario/{{$value->id}}">{{$value->nombre}} {{$value->apellidos}}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aún no tiene usuarios asignados</p>
        @endif
    @endif
    @if(Session::has('error'))
        <p>Ups..! Ha habido un error al obtener los datos</p>
    @endif
</div>
