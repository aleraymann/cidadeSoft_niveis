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

<body class="login mt-0">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
        <img src="{{ url("img/cidadesoft.jpg") }}" class="img-fluid" style="border-radius:5px; box-shadow: 3px 3px 5px grey">
                <h3 class="text-center mt-3">Registro</h3>
            <div class="login-form">
                <div class="form-group col-lg-12">
                    <label for="tipo">Tipo:</label>
                    <select onchange="verifica(this.value)" class="form-control input-border-bottom" id="tipo"
                        name="tipo">
                        <option value="A">Administrador</option>
                        <option value="F">Funcionario</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, Campo Obrigatório!
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-border-bottom"
                                name="name" value="{{ old('name') }}" required autofocus>
                            <label for="password" class="placeholder">Nome</label>
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-border-bottom"
                                name="email" value="{{ old('email') }}" required>
                            <label for="password" class="placeholder">E-mail</label>
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
                            <label for="password" class="placeholder">Senha</label>
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="password-confirm" type="password" class="form-control input-border-bottom"
                                name="password_confirmation" required>
                            <label for="password" class="placeholder">Confirme sua Senha</label>
                        </div>
                    </div>
                    <div class="form-group form-floating-label col-12">
                        <div>
                            <input id="adm" type="adm" class="form-control input-border-bottom" name="adm"
                                placeholder="Cod do Administrador" hidden>

                        </div>
                    </div>

                    <div class="form-action">
                        <a href="{{ url("/") }}" id="show-signin"
                            class="btn btn-danger btn-rounded btn-login mr-3">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-rounded btn-login">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="copyright text-center my-auto">
        <strong> <span>Copyright &copy; CidadeSoft 2020</span></strong>
        </div>
    </div>
</body>
<script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
<script src="{{ url("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js") }}"></script>
<script src="{{ url("js/core/popper.min.js") }}"></script>
<script src="{{ url("js/core/bootstrap.min.js") }}"></script>
<script src="{{ url("js/ready.js") }}"></script>
@endsection
<script>
    function verifica(value) {
        var tipo = document.getElementById("tipo");

        if (value == "A") {
            adm.hidden = true;
        } else if (value == "F") {
            adm.required = true;
            adm.hidden = false;

        }
    };

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#adm").mask("9999");
    });

</script>
