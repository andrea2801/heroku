@extends('layouts.master')

@section('content')
<section class="usuarios">
    <div class="row container-principal">
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12">
                            <p class="title-user">Usuarios</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="subtitle-user">Tus usuarios:</p>
                        </div>
                        @if (Auth::user()->rol_id == 1)
                        <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end">
                            <a class="nav-link text-center" href="{{route ('busqueda_usuarios')}}">
                                <p class="text-general">Búsqueda de usuarios <span></span><img class="nav-icon-img" src="{{asset('img/icons/buscar.png')}}" alt="horarios"></p>
                            </a>
                        </div>
                        @endif
                    </div>
                    <hr>
                </div>
                <div class="col-12 col-md-10 mt-4">
                    <div class="row">
                        @foreach ($usuarios as $usuario)
                        <div class="col-12 col-md-3 mt-2">
                            <ul>
                                <li class="user-list">
                                    <a href="/usuario/{{$usuario->id}}">{{$usuario->apellidos}}, {{$usuario->nombre}}</a>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-10 d-flex justify-content-end">
                    {!!$usuarios->links()!!}
                </div>
            </div>
        </div>
        @if(Session::has('eliminado'))
            <script type="text/javascript">
                Swal.fire({
                     icon: 'success',
                     title: 'Done',
                     text: 'Usuario eliminado'
                 })
             </script>
        @elseif(Session::has('error'))
        <script type="text/javascript">
            Swal.fire({
                 icon: 'error',
                 title: 'Ups!',
                 text: 'Error al dar de baja'
             })
         </script>
         @endif
    </div>
</section>
@endsection
