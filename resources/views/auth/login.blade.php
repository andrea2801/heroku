@extends('layouts.app')

@section('content')
<section class="login d-flex align-items-center p-5">
    <div class="row container-principal justify-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
            <img src="{{asset('img/Logo2.png')}}" alt="DeltaSAd">
        </div>
        <div class="col-12 col-md-6 login_form d-flex justify-content-center align-items-center mt-md-0 mt-5">
            <form class="formulario" method="post" action="{{route('login')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-group dni_login">
                        <div class="row d-flex justify-content-center">
                            <label class="col-8 rect_mobil dni_mov align-items-center d-flex" for="dni_input_login">{{ __('DNI') }}</label>
                            <input id="dni_input_login" type="text" class="col-8 form-control @error('dni') is-invalid @enderror" name="dni" required autocomplete="off" autofocus>
                                @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row password_login d-flex justify-content-center">
                        <label class="col-8 rect_mobil pass_mov align-items-center d-flex" for="password_input_login">{{ __('Contaseña') }}</label>
                        <input id="password_input_login" type="password" class="col-8 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="row row d-flex justify-content-center">
                        <div class="col-9 justify-content-center d-flex">
                            <button type="submit" class="btn btn-general botton_login">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                        <a class="btn btn-link col-12 forgot_password">
                            {{ __('¿Has olvidado tu contraseña?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
</section>
@endsection
