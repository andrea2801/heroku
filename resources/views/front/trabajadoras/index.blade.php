@if (Auth::user()->id == 1)
    @extends('layouts.master')
    @section('content')
        <section class="trabajadoras">
            <div class="row container-principal">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10">
                            <p class="title-user">Trabajadora</p>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="subtitle-user">Tu equipo</p>
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0 d-flex justify-content-start justify-content-md-end">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" id="btn-nueva" class="btn btn-general" data-toggle="modal" data-target="#nueva">Nueva</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('trabajadoras.todas')}}">
                                                <button type="button" class="btn btn-general">Buscar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="modal fade" id="usuario">
                                <div class="modal-dialog">
                                    <div id="usuariocontent" class="modal-content content-box">
                                    </div>
                                </div>
                            </div>
                            @include('front.trabajadoras.store')
                            @if(isset($tfs))
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10">
                                        <div class="row justify-content-center justify-content-md-between">
                                            @foreach ($tfs as $tf)
                                                <div class="card mb-3 p-0 col-10 col-md-3">
                                                    <div class="row">
                                                        <div class="col-12 justify-content-center d-flex">
                                                            @if(isset($tf->img))
                                                                <img src="imagenUser/{{$tf->img}}" class="card-img-top" alt="imagen trabajadora">
                                                            @else
                                                                <img src="/img/icons/trabajadora.png" class="card-img-top" alt="imagen trabajadora">
                                                            @endif
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <h4 class="card-body bg-color mt-0 mb-0">{{$tf->nombre}}</h4>
                                                        </div>
                                                        <div class="col-12 list-group-flush">
                                                            <ul class="list-group">
                                                                <li class="list-group-item normal-text"><span><strong>Dni: </strong></span>{{$tf->dni}}</li>
                                                                <li class="list-group-item normal-text"><span><strong>Teléfono: </strong></span>{{$tf->telefono}}</li>
                                                                <li class="list-group-item normal-text"><span><strong>Email: </strong></span>{{$tf->email}}</span></li>
                                                                <li class="list-group-item normal-text"><span><strong>Zona: </strong></span>{{$tf->zona}}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12 text-center mb-4">
                                                            <a href="#" onclick="usuarios({{$tf->id}})" class="card-link text-decoration-none p-2" data-toggle="modal" data-target="#usuario">Ver usuarios</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pendiente que funcione desde app.js-->
        <script>
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
        </script>
    @endsection
@else
    <script>
        window.location ='/home';
    </script>
@endif
