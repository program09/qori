@extends('layouts.app')

@section('content')
    <div class="cont_login">
        <div class="section_info"></div>
        <div class="section_login">
            <form class="login" id="login" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="logo">
                    <img src="{{ asset('img/qori2.png') }}" alt="">
                    <p>Correo: admi@gmail.com <br> Password: 123456789</p>
                    @error('email')
                        <span class="invalid-feedback-1" role="alert">
                            Existe un error en el correo o la contraseña
                        </span>
                    @enderror

                    @error('password')
                        <span class="invalid-feedback-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="input_cont">
                    <i class="fa-light fa-user"></i>
                    <input placeholder="Correo electrónico" autocomplete="off" id="email" type="email"
                        class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autofocus>
                </div>

                <div class="input_cont">
                    <i class="fa-light fa-shield-keyhole"></i>
                    <input placeholder="Contraseña" autocomplete="off" id="password" type="password"
                        class=" @error('password') is-invalid @enderror" name="password" required>
                </div>

                <div class="check_show_password">
                    <label class="container">
                        <input type="checkbox" id="checkbox">
                        <div class="checkmark"></div>
                        <span id="txt_show">Mostrar contraseña</span>
                    </label>
                </div>

                <a href="" class="link_txt">¿Olvidaste tu contraseña?</a>

                <button type="submit" id="btn_login" class="btn-primary login_btn">Ingresar</button>

                <a href="{{ route('register') }}" class="link_txt">Registrarme</a>

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
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
        <span class="invalid-feedback" role="alert">
                                                    error email
                                                </span>
    @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        -->
@endsection
