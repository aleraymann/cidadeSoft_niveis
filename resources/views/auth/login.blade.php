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
        <div class="container container-login">
            <img src="{{ url("img/cidadesoft.jpg") }}" class="img-fluid"
                style="border-radius:5px;  box-shadow: 3px 3px 5px grey">
            <h3 class="text-center mt-3">Login</h3>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-12 text-center">
                                <b class="ls-label-text" for="local">Qual Sistema deseja utilizar?</b>
                                <select onchange="verifica(this.value)" class="form-control input-border-bottom m-auto col-sm-6" id="local" name="local" required>
                                    <option value="">Selecione um Sistema</option>
                                    <option value="1">Dashboard</option>
                                    <option value="2">PDV</option>
                                </select>
                            </div>
                    </div>      
                            <input type="text" class="form-control input-border-bottom" name="cnpj" id="cnpj" placeholder="Informe o CNPJ" hidden>
                       

                    <div class="form-row">
                        <div class="form-group form-floating-label col-12">
                            <div>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-border-bottom"
                                    name="email" value="{{ old('email') }}" required>
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
                                        {{ __('Acessar') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                </form>
                <div class="login-account">
                    <span class="msg">Ainda não tem Conta?</span>
                    <a href="{{ route('register') }}" id="show-signup" class="link"><strong>
                            Cadastre-se</strong></a>
                </div>

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
        var local = document.getElementById("local");

        if (value == 1) {
            cnpj.hidden = true;
            cnpj.required = false;
            console.log('dashboard')
        } else if (value == 2){
            cnpj.hidden = false;
            cnpj.required = true;
            console.log('pdv')

        }
    };

</script>