<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CidadeSoft</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ url("img/CSicone.png") }}" type="image/x-icon" />

    <!-- Fonts and icons -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet"
        type="text/css">
    <script src="{{ url('js/plugin/webfont/webfont.min.js') }}"></script>
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

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url("css/demo.css") }}">

    <!-- Autentificação para todos os ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#cnpj").mask("99.999.999/9999-99");
    });

</script>
<body>

<div class="bg-primary" style="padding:10px;">
            <!-- Button to Open the Modal -->
            @include('sweetalert::alert')
            <a style="font-size:15px;padding:10px;"></a>
            <a class="btn btn-xs btn-danger float-right"  style="padding:5px;" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									<i class="flaticon-arrow"></i>
									{{ __('Sair') }}
								  </a>
								  
								  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								  </form>
            <!--end container-->
        </div>
    <div class="col-sm-12 m-auto mt-2">
        <div class="card ">
            <div class="text-center mt-2">
                <img src="{{ url("img/cidadesoft.jpg") }}" class="img-fluid"
                        style="border-radius:5px;  box-shadow: 3px 3px 5px grey;">
            </div>
            <div class="card-header">
                <h4 class="text-center">Bem Vindo ao Módulo PDV</h4>
                
            </div>
            <div class="card-body">
            <h5 class="card-title text-center mb-3">CNPJ informado:</h5>
                <form method="post" action="{{ url("/pdv/pdv") }}" enctype="multipart/form-data">
                    <div class="form-row container">
                        <div class="form-group col-lg-3 m-auto text-center">
                            <b class="ls-label-text" for="cnpj">CNPJ:</b>
                            <input type="text" class="form-control input-border-bottom" name="cnpj" id="cnpj"
                                onblur="pesquisaAjax()" value="{{isset($cnpj) ? $cnpj : '' }}" autofocus>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-1 text-center  m-auto">
                            <b class="ls-label-text" for="cod_empresa">Cod:</b>
                            <input type="text" class="form-control input-border-bottom text-center" name="cod_empresa"
                                id="cod_empresa" maxlength="5" readonly >
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="form-group col-lg-4  text-center  m-auto">
                            <b class="ls-label-text" for="Nome_Fantasia">Nome Fantasia:</b>
                            <input type="text" class="form-control input-border-bottom text-center" name="Nome_Fantasia"
                                id="Nome_Fantasia" maxlength="5" readonly>
                            <div class="invalid-feedback">
                                Por favor, Campo Obrigatório!
                            </div>
                            <div class="valid-feedback">
                                Tudo certo!
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer text-center" id="botao" hidden>
                {{ csrf_field() }}
                <button class="btn btn-primary">Entrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</body>


</html>
<script>
    function pesquisaAjax() {
        var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute(
        'content'); // obrigatorio para qualqer pesquisa tanto get ou post 
        var cnpj = $('#cnpj').val(); // pega o valor marcado, lembra com o change(realiza a ação quando marca um)
        //console.log("numero é "+numBol);// display se ta pegando variavel
        $.ajax({
            url: '{{ url("pdv/pesquisa") }}', // qual é o link (funcao que vai fazer a consulta, tem q ter na rota)
            type: 'POST', // post ou get
            data: {
                '_method': 'POST',
                '_token': csrf_token,
                'CNPJ': cnpj
            }, // primeiro nome é como vai passar pro outro
            // repete post ou get(obrigatorio), token =>infoma o token que tem q ter em todo form   ,    e qual parametros vc vai passar tanto(nesse caso só o id laa)
            dataType: 'json', // tipo dos dados , em json ou xml array 
            success: function (data) { // se tiver sucesso faz codigo abaixo
                //console.log(data);
                if (data != null) {
                    console.log(data);
                    document.getElementById('Nome_Fantasia').value = data[
                    'Nome_Fantasia']; //se nao retornar nada , no caso deu erro lá no codigo
                    document.getElementById('cod_empresa').value = data['Codigo'];
                    if (data['Codigo'] != null) {
                        var botao = document.getElementById('botao');
                        botao.hidden = false;
                    }
                    return;
                } else {

                    document.getElementById('cod_empresa').value = 'Inexistente';
                    document.getElementById('Nome_Fantasia').value = 'Inexistente';
                    // aqui é se der erro, se der erro muda pra vaziu
                    console.log(data); // só pra debug mesmo dps vc tira

                }
            },
        });
    }

</script>
