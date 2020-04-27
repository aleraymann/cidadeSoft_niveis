@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ url("img/CSicone.png") }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ url("js/plugin/webfont/webfont.min.js") }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:100,200,300,400,500,600,700,800,900"]
            },
            custom: {
                "families": ["Flaticon", "LineAwesome"],
                urls: ["{{ url('css/fonts.css') }}"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("css/ready.min.css") }}">

</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Login</h3>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="form-group form-floating-label col-12">
                            <div>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-border-bottom"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email" class="placeholder">E-mail</label>
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   
                        <div class="form-group form-floating-label col-12">
                            <div>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-border-bottom"
                                    name="password" required>
                                <label for="password" class="placeholder">Password</label>
                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="row form-sub m-0">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a sua Senha?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-action m-auto">
                            <button type="submit" class="btn btn-success btn-rounded btn-login">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="login-account">
                    <span class="msg">Ainda não tem Conta?</span>
                    <a href="{{ route('register') }}" id="show-signup" class="link">Cadastre-se</a>
                </div>
                  
            </div>
            
        </div>
        
    </div>
    <div class="card-footer mt-2">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; CidadeSoft 2020</span>
				</div>
             </div>
    </body>
    <script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
    <script src="{{ url("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js") }}"></script>
    <script src="{{ url("js/core/popper.min.js") }}"></script>
    <script src="{{ url("js/core/bootstrap.min.js") }}"></script>
    <script src="{{ url("js/ready.js") }}"></script>
    @endsection
