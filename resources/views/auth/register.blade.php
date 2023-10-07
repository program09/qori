@extends('layouts.app')

@section('content')
    <div class="cont_login">
        <div class="section_info"></div>
        <div class="section_login">
            <form class="login" id="login" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="logo">
                    <img src="{{ asset('img/qori2.png') }}" alt="">
                </div>

                <div class="input_cont">
                    <i class="fa-light fa-user"></i>
                    <input placeholder="Nombre" id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                </div>

                <div class="input_cont">
                    <i class="fa-light fa-shield-keyhole"></i>
                    <input placeholder="Apellidos" id="lastname" type="text"
                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                        value="{{ old('lastname') }}" required autocomplete="lastname">
                </div>


                <div class="input_cont">
                    <i class="fa-light fa-shield-keyhole"></i>
                    <input placeholder="Correo electrónico" id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email">
                </div>


                <div class="input_cont">
                    <i class="fa-light fa-shield-keyhole"></i>
                    <input placeholder="Contraseña" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">
                </div>


                <div class="input_cont">
                    <i class="fa-light fa-shield-keyhole"></i>
                    <input placeholder="Confirmar contraseña" id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>



                <div class="check_show_password">
                    <label class="container">
                        <input type="checkbox" id="checkbox">
                        <div class="checkmark"></div>
                        <span id="txt_show">Mostrar contraseña</span>
                    </label>
                </div>

                <button type="submit" id="btn_login" class="btn-primary login_btn">Ingresar</button>

                <a href="{{ route('login') }}" class="link_txt">Iniciar sesión</a>

            </form>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            const password = $("#password");
            const txt_show = $("#txt_show");
            const checkbox = $("#checkbox");

            checkbox.click(function() {
                if (checkbox.is(":checked")) {
                    txt_show.text("Ocultar contraseña");
                    password.attr("type", "text");
                } else {
                    txt_show.text("Mostrar contraseña");
                    password.attr("type", "password");
                }
            });
        });
    </script>

















    <!--

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>




                            <div class="row mb-3">
                                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->
@endsection
